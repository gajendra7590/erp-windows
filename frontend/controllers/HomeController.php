<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\controllers\BaseController;

//models
use common\models\ProductsCategories;
use common\models\Products;
use common\models\ProductsMedia;
use common\models\ContactUs;
use common\models\Company;



class HomeController extends BaseController
{

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
        $this->view->params['body_class'] = 'Products-home-page';
        return $this->render('@app/views/products/home',[
            'categories' => $this->getCategories(),
            'products' => $this->getProducts()
        ]);
    }

    public function actionAboutUs(){
        $this->view->params['body_class'] = 'Products-aboutus-page';
        return $this->render('@app/views/other_pages/about_us');
    }

    public function actionContactUs(){
        $model = new ContactUs();
        $company = Company::find()->where(['status' => '1'])->asArray()->one();
//        echo '<pre>';print_r($company);die;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', "Your query submitted successfully. Our team will contact you soon");
            return $this->redirect(['/contact-us']);
        }
        $this->view->params['body_class'] = 'Products-contactus-page';
        return $this->render('@app/views/other_pages/contact_us',['model' => $model,'company' => $company]);
    }

    public function actionPrivacyPolicy(){
        $this->view->params['body_class'] = 'Products-privacy_policy-page';
        return $this->render('@app/views/other_pages/privacy_policy');
    }

    public function actionTermsAndConditions(){
        $this->view->params['body_class'] = 'Products-terms_and_conditions-page';
        return $this->render('@app/views/other_pages/terms_and_conditions');
    }


    private function getCategories(){
        $categories =  ProductsCategories::find()
            ->where(['status' => 1])
            ->orderBy('featured','SORT_DESC')
            ->limit('3')
            ->asArray()
            ->all();
         return $categories;

    }

    private function getProducts(){
        $products = [];
        $categories =  ProductsCategories::find()
            ->select('id,category_name,category_slug')
            ->where(['status' => 1])
            ->orderBy('featured','SORT_DESC')
            ->limit('3')
            ->asArray()
            ->all();
        if(!empty($categories)){
            foreach ($categories as $k => $category){
                //echo $category['id'];
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
                          },
                         'productsReviews' => function($model){
                              $model->select('product_id,AVG(review_value) as review')->groupBy('product_id');
                          }
                     ])
                    ->select('products.id,products.product_categories,products.title,products.slug,short_desc,
                     product_regular_price,product_sale_price,product_type,featured_image')
                    ->where(['products.status' => 1])
                    ->andWhere(new \yii\db\Expression('FIND_IN_SET(:cat_to_find,products.product_categories)'))
                    ->addParams([':cat_to_find' => $category['id']])
                    ->orderBy('products.is_featured','SORT_DESC')
                    ->limit('4')
                    ->asArray()
                    ->all();
                $categories[$k]['products'] = $prod;
//                echo '<pre>';print_r($prod);die;
            }
        }
        return $categories;

    }
}
