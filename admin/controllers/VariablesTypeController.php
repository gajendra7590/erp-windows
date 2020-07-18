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
//models

use common\models\VariablesType;
use common\models\VariablesTypeSearch;

/**
 * VariablesTypeController implements the CRUD actions for VariablesType model.
 */
class VariablesTypeController extends Controller
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
     * Lists all VariablesType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VariablesTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VariablesType model.
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
     * Creates a new VariablesType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VariablesType();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()){
                Yii::$app->session->setFlash('success', "New variable type added successfully.");
                return $this->redirect(['/variables-type']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VariablesType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                Yii::$app->session->setFlash('success', "Variable type updated successfully.");
                return $this->redirect(['/variables-type']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VariablesType model.
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
            Yii::$app->session->setFlash('success', "Variables type archieved successfully.");
            return $this->redirect(['/variables-type']);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the VariablesType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VariablesType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VariablesType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
