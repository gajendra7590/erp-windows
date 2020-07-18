<?php

namespace frontend\controllers;
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

class CategoriesController extends BaseController
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
        $this->view->params['body_class'] = 'Category-list-page';
        return $this->render('@app/views/products/categories',[
            'categories' => $this->getCatWithProducts(),
        ]);
    }

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

}
