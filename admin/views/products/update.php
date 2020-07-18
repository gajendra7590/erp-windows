<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Update Product';
$this->params['breadcrumbs'][] = $this->title;
?>
        <?= $this->render('_form', [
            'model' => $model,
            'mediaHtml' => isset($mediaHtml)?$mediaHtml:'',
            'otherInfoHtml' => isset($otherInfoHtml)?$otherInfoHtml:'',
        ]) ?>
