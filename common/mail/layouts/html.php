<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,100%,700&display=swap");
        @media only screen and (max-width:600px) {
            td[class=head-title] {
                font-size: 24px !important;
                padding-bottom: 10px !important;
                line-height: 32px !important;
            }
            div[class=mb_View] {
                width: 96% !important;
                padding-left: 2%;
                padding-right: 2%;
            }
        }

        @media only screen and (max-width:480px) {
            img[class=logo_img] {
                width: 90px !important;
            }
        }
    </style>
    <?php $this->head() ?>
</head>
<body style="margin:0; padding:0; font-family: 'Montserrat', sans-serif !important; color:#333;" bgcolor="#f4f4f4">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
