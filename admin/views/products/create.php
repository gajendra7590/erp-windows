<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ManageUser */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = $this->title;
?>
        <?= $this->render('_form', [
            'model' => $model,
            'mediaHtml' => isset($mediaHtml)?$mediaHtml:'',
            'otherInfoHtml' => isset($otherInfoHtml)?$otherInfoHtml:'',
        ]) ?>



