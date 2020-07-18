<?php

namespace frontend\controllers;
use common\models\ProductsReviews;
use common\models\ProductsWishlist;
use Yii;
use common\helpers\Cart;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Request;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

use frontend\controllers\BaseController;

//models
use common\models\ProductsCategories;
use common\models\Products;
use common\models\ProductsMedia;

class ProductsController extends BaseController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','wishlist-item'],
                'rules' => [
                    [
                        'actions' => ['index','wishlist-item','get-reviews',
                        'ajax-review-validate','ajax-review-submit'],
                        'allow' => true,
                        'roles' => [],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'wishlist-item' => ['put'],
                    'get-reviews' => ['get'],
                    'ajax-review-validate' => ['post'],
                    'ajax-review-submit' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Home page / Index Page / Main Page
     */
    public function actionIndex()
    {
        $this->view->params['body_class'] = 'Products-list-page';
        return $this->render('@app/views/products/products',[
            'categories' => $this->getCatWithProducts(),
        ]);
    }

    //Callback function for index function
    private function getCatWithProducts()
    {
        $categories = ProductsCategories::find()
            ->select('id,category_name,category_slug')
            ->where(['status' => 1])
            ->orderBy('featured', 'SORT_DESC')
            ->asArray()
            ->all();
        if (!empty($categories)) {
            foreach ($categories as $k => $category) {
                $prod = Products::find()
                    ->with([
                        'variablesPrice'=> function($model){
                            $model->select('
                                  product_id,
                                  MIN(sale_price) as MinSP,
                                  MAX(sale_price) as MaxSP,
                                  MIN(regular_price) as MinRP, 
                                  MAX(regular_price) as MaxRP'
                            )->groupBy('product_id');
                        }
                    ])
                    ->select('id,product_categories,title,slug,product_type,
                     product_regular_price,product_sale_price,featured_image')
                    ->where(['status' => 1])
                    ->andWhere(new \yii\db\Expression('FIND_IN_SET(:cat_to_find,product_categories)'))
                    ->addParams([':cat_to_find' => $category['id']])
                    ->orderBy('is_featured', 'SORT_DESC')
                    ->limit('4')
                    ->asArray()
                    ->all();
                $categories[$k]['products'] = $prod;
            }
        }
        return $categories;
    }

    public function actionProductDetail($slug){
        $product = Products::find()->with([
            'variablesPrice'=> function($model){
                $model->select('product_id,
                      MIN(sale_price) as MinSP,
                      MAX(sale_price) as MaxSP,
                      MIN(regular_price) as MinRP, 
                      MAX(regular_price) as MaxRP'
                )->groupBy('product_id');
            },
            'variables' => function($model){
                return $model->with([
                    'productsVarsRowsItems' => function($model){
                        $model->with([
                            'varType' => function($model){ $model->select('id,vname');  }
                        ])->select('*');
                    }
                ])->select('*');
            },
            'productMedia' => function($model){
                return $model->select('*');
            },
            'productsOtherInfo' => function($model){
                return $model->select('*');
            },
        ])->select('*')
            ->where(['slug' => $slug])->asArray()->one();
        if(!$product){
            return $this->redirect(['/']);
        }

//        echo '<pre>';print_r($product);die;

        $model = new ProductsReviews();
        $review_status = 0;
        if(!Yii::$app->user->isGuest){
            $uid = isset(Yii::$app->user->identity->id)?Yii::$app->user->identity->id:0;
            $modelObj = ProductsReviews::findOne(['product_id'=>$product['id'],'user_id' => $uid]);
            if($modelObj){
                $model = $modelObj;
                $review_status = 1;
            }
        }

        $this->view->params['body_class'] = 'Products-single-page';
        return $this->render('@app/views/products/product_single',[
            'product' => $product,
            'cart_item' => Cart::ItemExist($product['id']),
            'wishlist' => $this->isInWishList($product['id']),
            'product_review' => $this->productCurrentReview($product['id']),
            'reviewModel' => $model,
            'review_status' => $review_status
        ]);
    }

    /**
     * Product List By Category
     */
    public function actionCategory($slug)
    {
        $cat = ProductsCategories::find()
            ->select('id,category_name,category_slug,category_img,featured,status')
            ->where(['category_slug' => $slug])->asArray()->one();
        if(!$cat){
            return $this->redirect(['/']);
        }

        $cat['products'] = Products::find()
        ->with([
            'variablesPrice'=> function($model){
                $model->select('
                              product_id,
                              MIN(sale_price) as MinSP,
                              MAX(sale_price) as MaxSP,
                              MIN(regular_price) as MinRP, 
                              MAX(regular_price) as MaxRP'
                )->groupBy('product_id');
            }
        ])
        ->select('id,product_categories,title,slug,product_type,
                 product_regular_price,product_sale_price,featured_image')
        ->where(['status' => 1])
        ->andWhere(new \yii\db\Expression('FIND_IN_SET(:cat_to_find,product_categories)'))
        ->addParams([':cat_to_find' => $cat['id']])
        ->orderBy('is_featured', 'SORT_DESC')
//        ->limit('8')
        ->asArray()
        ->all();
//        echo '<pre>';print_r($cat);die;
        $this->view->params['body_class'] = 'Products-by_category-page';
        return $this->render('@app/views/products/products_by_category',[
            'products' => $cat
        ]);
    }

    public function actionWishlistItem($id){
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $wl = ProductsWishlist::findOne(['product_id' => $id,'user_id' => Yii::$app->user->identity->id]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($wl){
            $wl->delete();
            return $this->asJson([
                'success' => true,
                'message' => 'Product remove from wishlist'
            ]);
        }else{
            $wl = new ProductsWishlist();
            $wl->product_id = $id;
            $wl->user_id = Yii::$app->user->identity->id;
            $wl->save();

            return $this->asJson([
                'success' => true,
                'message' => 'Product added into wishlist'
            ]);
        }
    }

    private function productCurrentReview($id){
        //echo $id;die;
        $product = ProductsReviews::find()
            ->select('avg(review_value) as review_avg,count(id) as review_cnt')
            ->where(['product_id' => $id])
            ->asArray()
            ->one();
        return $product;
        //echo '<pre>';print_r( $product );die;
    }


    //Callback function for check product is in wishlist
    private function isInWishList($pid){
        if(Yii::$app->user->isGuest){
            return 'no_auth';
        }else{
            $uid = Yii::$app->user->identity->id;
            return ProductsWishlist::find()->where(['product_id' => $pid,'user_id'=> $uid])->asArray()->one();
        }
    }

    //Get Product Detail page orders
    public function actionGetReviews($id){
        if( (Yii::$app->request->isAjax) && (Yii::$app->request->isGet) ){
              $reivews = ProductsReviews::find()
                ->with([
                      'product' => function($model){
                          $model->select('id,title,slug');
                      },
                      'user' => function($model){
                        $model->select('id,first_name,last_name,profile_photo');
                      }
                  ])
                ->where(['product_id' => $id])
                ->asArray()
                ->all();
            return $this->renderAjax('@app/views/products/ajax/review_list',[
                'reivews' => $reivews
            ]);
        }
    }

    public function actionAjaxReviewValidate($id){
        $uid = Yii::$app->user->identity->id;
        $model = ProductsReviews::findOne(['product_id'=>$id,'user_id' => $uid]);
        if($model == NULL){
            $model = new ProductsReviews();
        }
        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::$app->response->format='json';
                return ActiveForm::validate($model);
            }else{
                return true;
            }
        }
    }

    public function actionAjaxReviewSubmit($id){
        $uid = Yii::$app->user->identity->id;
        $model = ProductsReviews::findOne(['product_id'=>$id,'user_id' => $uid]);
        if($model == NULL){
            $model = new ProductsReviews();
            $model->product_id = $id;
            $model->user_id = $uid;
        }
        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post('ProductsReviews');
           // echo '<pre>';print_r($model);die;
            if($model->save()){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->asJson([
                    'success'=>true,
                    'redirect_url' => '',
                    'message'=>'Your review submitted'
                ]);
            }
        }

    }
}
