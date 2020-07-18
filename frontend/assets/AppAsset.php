<?php
namespace frontend\assets;
use yii\web\AssetBundle;
/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/sweetalert.min.css',
        'theme/css/font-awesome.min.css',
        'theme/css/owl.carousel.min.css',
        'theme/css/bootstrap-select.min.css',
        'theme/css/owl.theme.default.min.css',
        'theme/css/custom.css',
        'theme/css/responsive-custom.css',
        'theme/css/checkout.css',
        'css/loading_place_holder.css',
        'css/frontend.css'
    ];
    public $js = [
        'theme/js/bootstrap.min.js',
        'theme/js/sweetalert.min.js',
        'theme/js/owl.carousel.min.js',
        'theme/js/bootstrap-select.min.js',
        'theme/js/custom.js',
        'theme/js/custom_new.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
