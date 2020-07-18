<?php

namespace admin\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use admin\controllers\BaseController;
use common\helpers\Utils;
use common\models\User;
use common\models\Products;
use common\models\ProductsOrders;




class DashboardController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','top-vendors','top-experiences-by-order','get-all-counts'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }

    public function init(){
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\UnauthorizedHttpException();
        }
    }
    public function actionIndex()
    {
        return $this->render('@app/views/dashboard/index',[
            'total_product_count' => $this->getTotalProductCount(),
            'total_orders_count' => $this->getTotalOrdersCount(),
            'total_clients_count' => $this->getTotalClientsCount(),
            'total_vendors_count' => $this->getTotalVendorsCount()
        ]);
    }

    private function getTotalProductCount(){
        $user = Yii::$app->user->identity;
        $count = 0;
        if($user->role == '1'){
            $count = Products::find()->where(['status' => 1])->count();
        }else{
            $count = Products::find()->where(['status' => 1,'user_id' => $user->id])->count();
        }
        return $count;
    }

    private function getTotalOrdersCount(){
        $user = Yii::$app->user->identity;
        $count = 0;
        if($user->role == '1'){
            $count = ProductsOrders::find()->count();
        }
        return $count;

    }

    private function getTotalClientsCount(){
        $user = Yii::$app->user->identity;
        $count = 0;
        if($user->role == '1'){
            $count = User::find()->where(['role' => 2])->count();
        }
        return $count;
    }

    private function getTotalVendorsCount(){
        $user = Yii::$app->user->identity;
        $count = 0;
        if($user->role == '1'){
            $count = User::find()->where(['role' => 3])->count();
        }
        return $count;
    }



}
