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
use common\models\Employees;
use common\models\EmployeesSearch;
use common\helpers\Utils;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
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
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,3);
        $dataProvider->pagination->pageSize = 5;
        $dataProvider->pagination->route = 'employees';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
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
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employees();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //file upload code start
            $upload_image = UploadedFile::getInstance($model, 'upload_image');
            if($upload_image){
                $file_name = Utils::getUniqueFileName().'.'.$upload_image->extension;
                $is_success = $upload_image->saveAs('../../uploads/employees/'.$file_name);
                if($is_success){
                    $model->profile_photo = 'uploads/employees/'.$file_name;
                }
            }
            //file upload code end
            if($model->save()){
                Yii::$app->session->setFlash('success', "New employee added successfully.");
                return $this->redirect(['/employees']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employees model.
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
                $upload_image= UploadedFile::getInstance($model, 'upload_image');
                if ($upload_image) {
                    $file_name = Utils::getUniqueFileName() . '.' . $upload_image->extension;
                    $is_success = $upload_image->saveAs('../../uploads/employees/' . $file_name);
                    if ($is_success) {
                        $model->profile_photo = 'uploads/employees/' . $file_name;
                    }
                }
                //file upload code end
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Employee detail updated successfully.");
                    return $this->redirect(['/employees']);
                }
            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employees model.
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
            Yii::$app->session->setFlash('success', "Employee Archive Successfully.");
            return $this->redirect(['/employees']);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
