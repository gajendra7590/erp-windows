<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'home/error',
        ],
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''=>'home/index',
                'index'=>'home/index',
                'about-us'=>'home/about-us',
                'contact-us'=>'home/contact-us',
                'privacy-policy'=>'home/privacy-policy',
                'terms-and-conditions'=>'home/terms-and-conditions',
                'category/<slug>'=>'products/category',
                'product/<slug>'=>'products/product-detail',
                'cart'=>'cart/cart',
                'checkout'=>'checkout/checkout',
                'my-account'=>'account/index',
                'order-success' => 'account/order-success',
                'login'=>'auth/login',
                'signup'=>'auth/signup',
                'request-password-reset'=>'auth/request-password-reset',
                'resend-verification-email'=>'auth/resend-verification-email',
                'verify-email'=>'auth/verify-email',
                'reset-password'=>'auth/reset-password',
                'logout'=>'auth/logout',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::class,
            'socialNetworks' => [
                '<span class="facebook">Facebook</span>' => [
                    'class' => \ymaker\social\share\drivers\Facebook::class,
                    //'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-facebook-square']),
                ],
                '<span class="twitter">Twitter</span>' => [
                    'class' => \ymaker\social\share\drivers\Twitter::class,
                    //'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-twitter']),
                ],
                '<span class="pinterest">Pinterest</span>' => [
                    'class' => \ymaker\social\share\drivers\Pinterest::class,
                    ///'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-pinterest']),
                ],
                '<span class="linkedIn">LinkedIn</span>' => [
                    'class' => \ymaker\social\share\drivers\LinkedIn::class,
                    //'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-linkedin']),
                ],
                '<span class="whatsapp">WhatsApp</span>' => [
                    'class' => \ymaker\social\share\drivers\WhatsApp::class,
                    //'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-whatsapp']),
                ],
                '<span class="telegram">Telegram</span>' => [
                    'class' => \ymaker\social\share\drivers\Telegram::class,
                    // 'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-telegram']),
                ],
            ],
        ],
        'stripe' => [
            'class' => 'ruskid\stripe\Stripe',
            'publicKey' => "pk_test_4XP2DS4TJJ4V5LPgjF0fmTOw00w165HlbK",
            'privateKey' => "sk_test_OJepHGO3On5Lumo8Zu8q79T300fgj4sG2W",
        ],
    ],
    'params' => $params,
];
