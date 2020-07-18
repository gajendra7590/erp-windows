<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Update Variable type';
?>
<section class="exp__Frm--cst">
    <!-- Edit add_new_client section -->
    <div class="exp__Frm--ele">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</section>
