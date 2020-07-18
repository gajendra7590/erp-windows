<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/font-awesome.min.css',
        'theme/css/sweetalert.min.css',
        'theme/css/toastr.min.css',
        'theme/css/custom.css',
        'theme/css/responsive-custom.css'
    ];
    public $js = [
        'theme/js/bootstrap.min.js',
        'theme/js/jquery.validate.min.js',
        'theme/js/sweetalert.min.js',
        'theme/js/toastr.min.js',
        'theme/js/grids.js',
        'theme/js/admin_custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
