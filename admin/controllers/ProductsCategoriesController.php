<?php

namespace admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\UploadedFile;

use admin\controllers\BaseController;
use common\models\ProductsCategories;
use common\models\ProductsCategoriesSearch;
use common\helpers\Utils;

/**
 * ProductsCategoriesController implements the CRUD actions for ProductsCategories model.
 */
class ProductsCategoriesController extends Controller
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
                        'actions' => ['index','view','create', 'update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            if( isset(Yii::$app->user->identity->role) && (Yii::$app->user->identity->role == '1') ){
                                return true;
                            }else{
                                Yii::$app->session->setFlash('error', "You are not authorised to access this.");
                                return false;
                            }
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    Yii::$app->response->redirect(['/login']);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function init(){
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\UnauthorizedHttpException();
        }
    }

    /**
     * Lists all ManageUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,3);
        $dataProvider->pagination->pageSize = 5;
        $dataProvider->pagination->route = 'products-categories';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManageUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ManageUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductsCategories();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //file upload code start
            $temp_image = UploadedFile::getInstance($model, 'temp_image');
            if($temp_image){
                $file_name = Utils::getUniqueFileName().'.'.$temp_image->extension;
                $is_success = $temp_image->saveAs('../../uploads/categories/'.$file_name);
                if($is_success){
                    $model->category_img = 'uploads/categories/'.$file_name;
                }
            }
            //file upload code end
            // var_dump($model->save());die;
            if($model->save()){
                Yii::$app->session->setFlash('success', "New category created successfully.");
                return $this->redirect(['/products-categories']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ManageUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //file upload code start
            $temp_image = UploadedFile::getInstance($model, 'temp_image');
            if($temp_image){
                $file_name = Utils::getUniqueFileName().'.'.$temp_image->extension;
                $is_success = $temp_image->saveAs('../../uploads/categories/'.$file_name);
                if($is_success){
                    $model->category_img = 'uploads/categories/'.$file_name;
                }
            }
            //file upload code end

            if($model->save()){
                Yii::$app->session->setFlash('success', "Category updated successfully.");
                return $this->redirect(['/products-categories']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ManageUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model){
            $model->status = 2;
            $model->save();
            Yii::$app->session->setFlash('success', "Category archive successfully.");
            return $this->redirect(['/products-categories']);
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }

    /**
     * Finds the ManageUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductsCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = ProductsCategories::find()->where(['id'=>$id])->one();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
