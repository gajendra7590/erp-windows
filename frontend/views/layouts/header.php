<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
$current_url = Yii::$app->getRequest()->getPathInfo();
//echo $current_url;

//common confirm dialog box
//use xj\bootbox\BootboxAsset;
//BootboxAsset::register($this);
//BootboxAsset::registerWithOverride($this);
?>
<!-- Header Area Start -->
<header class="Header">
    <nav class="navbar widget__Nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ERp__Set">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand widget__header--logo" href="<?= Url::to(['/']);?>" title="ERP Windows">
                    <img src="<?= Url::to(['/theme/images/icons/erp_lg.png']);?>" alt="ERP Windows" class="img-responsive" />
                </a>
                <ul>
                    <li class="dropdown mobile_dropdown-user">
                        <a class="app-nav__item" href="javascript:void(0)" data-toggle="dropdown" aria-label="Show Profile">
                            <i class="fa fa-user-circle-o fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item menu-header" href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left user__icon--img">
                                            <img
                                               src="<?= Url::to('@web/theme/images/icons/user.png');?>"
                                               class="media-object"
                                               alt="user" />
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media_title">
                                                <?= (!Yii::$app->user->isGuest)
                                                    ?(Utils::getUserName(Yii::$app->user->identity))
                                                    :'Guest User';
                                                ?>
                                            </h5>
                                            <span class="view_profile">View Profile</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list_title">
                                <a href="javascript:void(0)">
                                    Personal Account
                                </a>
                            </li>
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/my-account']);?>">
                                        <i class="fa fa-user fa-lg"></i>
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <?php echo Html::tag('a', '<i class="fa fa-sign-out fa-lg"></i> Sign Out', [
                                            'class' => 'dropdown-item',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to log out?'
                                            ],
                                            'title' => 'Logged Out Your Account',
                                            'data-pjax' => 0,
                                            'data-method' => 'post',
                                            'href' => Url::to(['/logout'])
                                        ]
                                    );
                                    ?>
                                </li>
                            <?php } else{?>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/login']);?>">
                                        <i class="fa fa-sign-in fa-lg"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/signup']);?>">
                                        <i class="fa fa-sign-in fa-lg"></i>
                                        Register
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="ERp__Set">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= Url::to(['/']);?>">Home</a></li>
                    <li><a href="<?= Url::to(['/products']);?>">Products</a></li>
                    <li><a href="<?= Url::to(['/categories']);?>">Categories</a></li>
                    <li><a href="<?= Url::to(['/about-us']);?>">About Us</a></li>
                    <li><a href="<?= Url::to(['/contact-us']);?>">Contact Us</a></li>
                    <li><a href="<?= Url::to(['/cart']);?>">Cart</a></li>
                    <li class="dropdown deshktop_dropdown-user">
                        <a class="app-nav__item" href="javascript:void(0)" data-toggle="dropdown" aria-label="Show Profile">
                            <i class="fa fa-user-circle-o fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item menu-header" href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left user__icon--img">
                                            <img src="<?= Url::to('@web/theme/images/icons/user.png');?>" class="media-object" alt="user" />
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media_title">
                                                <?= (!Yii::$app->user->isGuest)
                                                    ?(Utils::getUserName(Yii::$app->user->identity))
                                                    :'Guest User';
                                                ?>
                                            </h5>
                                            <span class="view_profile">Account</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list_title">
                                <a href="javascript:void(0)">Personal Account</a>
                            </li>
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/my-account']);?>">
                                        <i class="fa fa-user fa-lg"></i>
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <?php echo Html::tag('a', '<i class="fa fa-sign-out fa-lg"></i> Sign Out', [
                                            'class' => 'dropdown-item',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to log out?'
                                            ],
                                            'title' => 'Logged Out Your Account',
                                            'data-pjax' => 0,
                                            'data-method' => 'post',
                                            'href' => Url::to(['/logout'])
                                        ]
                                    );
                                    ?>
                                </li>
                            <?php } else{?>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/login']);?>">
                                        <i class="fa fa-sign-in fa-lg"></i>
                                       Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::to(['/signup']);?>">
                                        <i class="fa fa-sign-in fa-lg"></i>
                                        Register
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header Area Closed -->
