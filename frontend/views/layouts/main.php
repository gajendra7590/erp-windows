<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use common\helpers\Utils;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= Utils::IMG_URL('uploads/other/fav_icn.png');?>" type="image/x-icon" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>
</div>
<body class="<?= (isset($this->params['body_class'])?$this->params['body_class']:'');?>">
<input name="MainBaseURL" id="MainBaseURL" type="hidden" value="<?= Url::to(['/']);?>">
<?php $this->beginBody() ?>
<!-- Toastr message shows -->
<?php Utils::TaostrWidget(); ?>
<?php
echo $this->render('header');
echo $content;
echo $this->render('footer');
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
