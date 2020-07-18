<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Update Employee';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="exp__Frm--cst">
    <!-- Edit add_new_client section -->
    <div class="exp__Frm--ele">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?> 
    </div>
</section>
