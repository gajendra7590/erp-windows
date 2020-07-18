<?php

namespace admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\helpers\Url;
use common\helpers\Utils;
use yii\web\Request;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

use admin\controllers\BaseController;
use common\models\Products;
use common\models\ProductsSearch;
use common\models\ProductsMedia;
use common\models\ProductsVariations;
use common\models\ProductsOtherInfo;
use common\models\VariablesType;
use common\models\ProductsVarsRows;
use common\models\ProductsVarsRowsItems;


class ProductsController extends Controller
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
                        'actions' => ['index','view','create', 'update','delete','ajax-validation',
                         'upload-media','delete-media','get-variable-prod','published','add-more-otherinfo'
                        ],
                        'allow' => true,
                        'roles' => ['@']
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
                    'ajax-validation' => ['post'],
                    'upload-media' => ['post'],
                    'delete-media' => ['post'],
                    'published' => ['post'],
                    'add-more-otherinfo' => ['get']
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
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,3);
        $dataProvider->pagination->pageSize = 10;
        $dataProvider->pagination->route = 'products';

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
     * ajaxForm Validation
     */
    public function actionAjaxValidation($id = null)
    {
        $model = new Products();
        if($id){
            $model = $this->findModel($id);
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

    /**
     * Creates a new ManageUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $prodVarDefault = VariablesType::find()->where(['vstatus' => '1','vdefault' => '1'])
            ->select('GROUP_CONCAT(id) as ids')->asArray()->one();
        $model->product_variables = $prodVarDefault['ids'];

        $model->product_regular_price = 0;
        $model->product_sale_price = 0;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
//            echo '<pre>';print_r(Yii::$app->request->post());die;
            $fimage = UploadedFile::getInstance($model, 'fimage');
            if($fimage){
                $file_name = Utils::getUniqueFileName().'.'.$fimage->extension;
                $is_success = $fimage->saveAs('../../uploads/products/'.$file_name);
                if($is_success){
                    $model->featured_image = 'uploads/products/'.$file_name;
                }
            }

            if(!empty($model->categories)){
                $model->product_categories = implode(',',$model->categories);
            }
            $model->user_id = Yii::$app->user->identity->id;
            //file upload code end
            if($model->save()){
                //Slider Image While create action start here
                $insert_id = Yii::$app->db->getLastInsertID();
                $post = Yii::$app->request->post();
                if($post['Products']['product_type'] == '2'){
                    $this->addProductVariables($insert_id, $post['Products']['variable'] );
                }

                //Save/Update/Delete Other Info Tab
                $otherInfo = Yii::$app->request->post('Products');
                $this->saveProductOtherInfo($insert_id, isset($otherInfo['other_info'])
                    ?($otherInfo['other_info'])
                    :array());

                $media_img = Yii::$app->request->post('media_image');
                if($media_img){
                    foreach($media_img as $v){
                        $source = realpath(dirname(__FILE__).'/../../').'/uploads/temp_upload/'.$v;
                        $dest = realpath(dirname(__FILE__).'/../../').'/uploads/products/'.$v;
                        if (file_exists($source)) {
                            rename($source , $dest);
                            $media = new ProductsMedia();
                            $media->product_id  = $insert_id;
                            $media->name  = $v;
                            $media->url  = 'uploads/products/'.$v;
                            $media->save(false);
                        }
                    }
                }
                //Slider Image While create action end here
                Yii::$app->session->setFlash('success', "New Product added successfully.");
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->asJson([
                    'success'=>true,
                    'redirect_url' => Url::to(['/products']),
                    'message'=>'New Product added successfully.'
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'addOnsHtml'=>'',
            'otherInfoHtml' => ''
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
        if($model->product_variables == '' || $model->product_variables == null){
            $prodVarDefault = VariablesType::find()->where(['vstatus' => '1','vdefault' => '1'])
                ->select('GROUP_CONCAT(id) as ids')->asArray()->one();
            $model->product_variables = $prodVarDefault['ids'];
        }

        $mediaList = ProductsMedia::find()->where(['product_id'=>$id])->asArray()->all();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {

//            $post = Yii::$app->request->post();
//            $this->addProductVariables($id, $post['Products']['variable'] );
//            die;

            $fimage = UploadedFile::getInstance($model, 'fimage');
            if($fimage){
                $file_name = Utils::getUniqueFileName().'.'.$fimage->extension;
                $is_success = $fimage->saveAs('../../uploads/products/'.$file_name);
                if($is_success){
                    $model->featured_image = 'uploads/products/'.$file_name;
                }
            }

            if(!empty($model->categories)){
                $model->product_categories = implode(',',$model->categories);
            }

            //file upload code end
            if($model->save()){

                //Save/Update/Delete Other Info Tab
                $otherInfo = Yii::$app->request->post('Products');
                $this->saveProductOtherInfo($id, isset($otherInfo['other_info'])
                    ?($otherInfo['other_info'])
                    :array());

                $post = Yii::$app->request->post();
                if($post['Products']['product_type'] == '2'){
                    $this->addProductVariables($id, $post['Products']['variable'] );
                }else{

                    $itemRows = ProductsVarsRows::find()->where(['product_id' => $id])->all();
                    if( !empty($itemRows) ){
                        foreach ($itemRows as $row){
                            Yii::$app->db->createCommand()
                                ->delete('products_vars_rows_items',['row_id' => $row->id])->execute();
                            $row->delete();
                        }
                    }

                }
                Yii::$app->session->setFlash('success', "Product updated successfully.");
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->asJson([
                    'success'=>true,
                    'redirect_url' => Url::to(['/products']),
                    'message'=>'Product detail updated successfully'
                ]);
            }
        }
        $mediaListHtml = ($mediaList)?($this->renderAjax('ajax/media', ['media_images'=>$mediaList])):'';

        $otherInfoData = ProductsOtherInfo::find()->where(['product_id' => $id])->asArray()->all();
        $otherInfoHtml = ($otherInfoData)?($this->renderAjax('ajax/other_info', ['otherInfoData'=>$otherInfoData])):'';
        return $this->render('update', [
            'model' => $model,
            'mediaHtml' => $mediaListHtml,
            'otherInfoHtml' => $otherInfoHtml
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
        $client = $this->findModel($id);
        if($client){
            $client->status = 2;
            $client->save();
            Yii::$app->session->setFlash('success', "Vendors Archive Successfully.");
            return $this->redirect(['/vendors']);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the ManageUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ManageUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Products::find()->where(['id'=>$id])->one();
        if ($model !== null) {
            if($model->product_categories!=''){
                $model->categories = explode(',',$model->product_categories);
            }
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Function for upload multiple media images
     * @return bool|string|Response
     */
    public function actionUploadMedia(){
        if (Yii::$app->user->isGuest) { return $this->goHome(); } 
        if ( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ) {
            $product_id = Yii::$app->request->post('product_id');
            $media_id = 0;
            $action_type = 'insert';
            $temp_images = UploadedFile::getInstancesByName('upload_media');
            $upload_path = 'uploads/temp_upload/';
            if($product_id > 0){
                $upload_path = 'uploads/products/';
            }
            if($temp_images){
                $uploadArr = array();
                foreach ($temp_images as $temp_image){
                    $file_name = Utils::getUniqueFileName().'.'.$temp_image->extension;
                    $is_success = $temp_image->saveAs('../../'.$upload_path.$file_name);
                    if ($is_success){
                        $image_path = 'uploads/temp_upload/'.$file_name;
                        if($product_id > 0){
                            $media = new ProductsMedia();
                            $media->product_id = $product_id;
                            $media->name = $file_name;
                            $media->url = $upload_path.$file_name;
                            $save = $media->save(false);
                            if($save){
                                $media_id = $media->id;
                                $action_type = 'update';
                                $image_path = 'uploads/products/'.$file_name;
                            }
                        }
                        $uploadArr [] = array(
                            'img' => $image_path,
                            'name' => $file_name,
                            'product_id' => $product_id,
                            'media_id' => $media_id,
                            'action_type' => $action_type
                        );
                    }
                }
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('ajax/media', [
                    '_uploaded' => $uploadArr
                ]);

                }else{
                    return false;
                }
        }

    }

    /**
     * Function for save/update/delete other info tab values
     * @param $product_id
     * @param $data
     */
    private function saveProductOtherInfo($product_id,$data){
        $find = Products::findOne(['id' => $product_id]);
        if ($find) {
            if (!empty($data)) {
                foreach ($data as $k => $item) {
                    //IF New Item Added
                    if ($item['product_id'] == 0) {
                        $model = new ProductsOtherInfo();
                        $model->product_id = $product_id;
                        $model->tab_title = ($item['tab_title']!='')?$item['tab_title']:rand(111111,999999);
                        $model->tab_content = $item['tab_content'];
                        $model->save();
                    }
                    //IF Update Existing
                    if (($item['product_id'] > 0) && ($item['is_removed'] == '0')) {
                        $model = ProductsOtherInfo::findOne(['id' => $item['id']]);
                        if($model){
                            $model->tab_title = ($item['tab_title']!='')?$item['tab_title']:rand(111111,999999);
                            $model->tab_content = $item['tab_content'];
                            $model->save();
                        }
                    }
                    //IF Delete Existing
                    if (($item['product_id'] > 0) && ($item['is_removed'] == '1')) {
                        $model = ProductsOtherInfo::findOne(['id' => $item['id']]);
                        if($model){
                            $model->delete();
                        }
                    }
                }
            }

        }
    }

    /**
     * Function for delete meaia image
     */
    public function actionDeleteMedia(){
        if ( (Yii::$app->request->isAjax) && (Yii::$app->request->isPost) ) {
            $media_id = Yii::$app->request->post('media_id');
            $product_id = Yii::$app->request->post('product_id');
            $image_name = Yii::$app->request->post('image_name');
            if($media_id == 0 && $product_id == 0){
                $img_path = realpath(dirname(__FILE__).'/../../').'/uploads/temp_upload/'.$image_name;
                unlink($img_path);
                return true;
            }else{
                $media =  ProductsMedia::findOne(['id' => $media_id]);
                if($media){
                    $media->delete();
                    $img_path = realpath(dirname(__FILE__).'/../../').'/uploads/products/'.$image_name;
                    unlink($img_path);
                    return true;
                }
            }
        }

    }

    public function actionGetVariableProd(){
        if ( (Yii::$app->request->isAjax) && (Yii::$app->request->isGet) ) {
            $params =  Yii::$app->request->getQueryParams();
            $prod_id = isset($params['id'])?$params['id']:0;
            $action = isset($params['action'])?$params['action']:'add';

            $vars = ( isset($params['var_ids']) && ($params['var_ids']!='') )?explode(',',$params['var_ids']):array();
            $varData = [];
            if(!empty($vars)){
                $varData = VariablesType::find()
                    ->select('id,vname')
                    ->where(['in','id',$vars])
                    ->asArray()->all();
            }
            $edit_data = null;
            if($action == 'edit_data' && $prod_id > 0){
                $edit_data = ProductsVarsRows::find()
                ->where(['product_id' => $prod_id])
                ->asArray()
                ->all();
            }

//            echo '<pre>';print_r($edit_data);die;

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('ajax/variable_prod', [
                'prod_id' => $prod_id,
                'varData' => $varData,
                'edit_data' => $edit_data
            ]);
        }
    }

    protected function addProductVariables($id,$post){
        if( !empty($post)){
            foreach ($post as $v){
                //Delete Operation
                if( isset($v['is_deleted']) && ($v['is_deleted'] == '1')){
                    $deleteRows = ProductsVarsRowsItems::deleteAll(['row_id' => $v['id'] ]);
                    if($deleteRows){
                        $model = ProductsVarsRows::findOne(['id'=>$v['id']]);
                        if($model){
                            $model->delete();
                        }
                    }
                }else{
                    //Update Operation
                    if( isset($v['prod_id']) && ($v['prod_id'] > 0) && ($v['id'] > 0)){
                        $model = ProductsVarsRows::findOne(['id'=>$v['id']]);
                        $model->sale_price = $v['sale_price'];
                        $model->regular_price = $v['regular_price'];
                        $save =  $model->save();
                        if($save){
                            $dRows = [];
                            if(!empty($v['var_types'])){
                                foreach ($v['var_types'] as $index => $val){
                                    $rowItemModel = ProductsVarsRowsItems::find()->where([
                                        'row_id' => $v['id'],
                                        'var_type_id' => $index
                                    ])->one();

                                    if($rowItemModel){
                                        $rowItemModel->value = $val;
                                        $rowItemModel->save();
                                    }else{
                                        $newRow = new ProductsVarsRowsItems();
                                        $newRow->row_id = $v['id'];
                                        $newRow->var_type_id = $index;
                                        $newRow->value = $val;
                                        $newRow->save();
                                    }
                                    //Existing rows id
                                    array_push($dRows,$index);
                                }
                            }

                            //Existing delete if removed variable types
                            $rowItemModel = ProductsVarsRowsItems::find()->where(['not in','var_type_id',$dRows])
                                ->andWhere([ 'row_id' => $v['id'] ])->all();
                            if($rowItemModel){
                                foreach ($rowItemModel as $deleteRow){
                                    $deleteRow->delete();
                                }
                            }


                        }
                    }else{ //Insert Operation
                        $model = new ProductsVarsRows();
                        $model->product_id = $id;
                        $model->sale_price = $v['sale_price'];
                        $model->regular_price = $v['regular_price'];
                        $save =  $model->save();
                        if($save){
                            if(!empty($v['var_types'])){
                                foreach ($v['var_types'] as $index => $val){
                                    $rowItemModel = new ProductsVarsRowsItems();
                                    $rowItemModel->row_id = $model->id;
                                    $rowItemModel->var_type_id = $index;
                                    $rowItemModel->value = $val;
                                    $rowItemModel->save();
                                }
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

    public function actionPublished($id){
        $model = Products::findOne(['id'=>$id]);
        if ($model) {
           $model->status = ( $model->status == '1') ? 0 : 1;
            $save = $model->save( false);
            if($save){
                return $this->redirect(['/products/update?id='.$id]);
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddMoreOtherinfo(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('ajax/other_info', [
            'add_more' => true
        ]);
    }

}
