<?php
  use admin\widgets\Alert;
  use yii\helpers\Html;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use yii\widgets\Breadcrumbs;
  use yii\helpers\Url;
  use yii\helpers\BaseUrl;
  use common\helpers\Utils;

  $base_url = Yii::$app->getUrlManager()->getBaseUrl();

  //For Add Active Class
  $current_url = Yii::$app->getRequest()->getPathInfo();

?>
<div class="clearfix"></div>
    <!-- Sidebar Area Start-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <div class="layer-drop"></div>
    <section class="left_sidebar_wrapper">
        <div class="cross-icon"><span class="fa fa-close"></span></div>
        <div class="left_Sidebar_Sec">
            <div class="left_sidebar_Content">
                <div class="left_Logo">
                    <a href="<?= Url::to(['/dashboard']); ?>">
                        ERP
                    </a>
                </div>
                <div class="top_user">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= Url::to(['/manage-profile']);?>" title="Manage Your Profile">
                                <i class="fa fa-user-circle-o fa-2x sidebar_icons" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/change-password']);?>" title="Change Your Password">
                                <i class="fa fa-lock fa-2x sidebar_icons" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                        <?php echo Html::tag('a', '<i class="fa fa-sign-out fa-2x sidebar_icons" aria-hidden="true"></i>',[
                                    'class' => '',
                                    'data' => [
                                        'confirm' => 'Are you sure to logged out ?'
                                    ],
                                    'title'=>'Logged Out Your Account',
                                    'data-pjax' => 0,
                                    'data-method' => 'post',
                                    'href'=> Url::to(['/logout'])
                                ]
                            );
                         ?>
                        </li>
                    </ul>
                </div>
            </div>
            <aside class="app-sidebar">
                <div class="app-sidebar_Heading">
                    <h4>
                       <?php echo (isset(Yii::$app->user->identity->first_name))?(ucfirst(Yii::$app->user->identity->first_name).' '.ucfirst(Yii::$app->user->identity->last_name) ):''; ?>
                    </h4>
                    <p>
                       <?php echo (isset(Yii::$app->user->identity->role))? Utils::getUser(Yii::$app->user->identity->role) :'Admin'; ?>
                    </p>
                </div>
                <ul class="app-menu">
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                                '',
                                'dashboard'
                        ]))?'active':'' ?>" href="<?= $base_url.'/dashboard'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Dashboard</span>
                        </a>
                    </li>
                    <?php if(Yii::$app->user->identity->role == '1'){ ?>
                        <li>
                            <a class="app-menu__item <?php echo (in_array($current_url, [
                                    'company',
                                    'company/index',
                                    'company/create',
                                    'company/update'
                            ]))?'active':'' ?>" href="<?= $base_url.'/company'; ?>">
                                <span class="icons_blue">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                </span>
                                <span class="icons_white">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                </span>
                                <span class="app-menu__label">Company Detail</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                            'orders',
                            'orders/index',
                            'orders/create',
                            'orders/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/orders'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Orders List</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                                'products',
                                'products/index',
                                'products/create',
                                'products/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/products'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Products</span>
                        </a>
                    </li>
                    <?php if(Yii::$app->user->identity->role == '1'){ ?>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                                'products-categories',
                                'products-categories/index',
                                'products-categories/create',
                                'products-categories/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/products-categories'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-codepen" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-codepen" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Product Categories</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                            'variables-type',
                            'variables-type/index',
                            'variables-type/create',
                            'variables-type/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/variables-type'; ?>">
                        <span class="icons_blue">
                            <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        </span>
                            <span class="icons_white">
                            <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        </span>
                            <span class="app-menu__label">Variables</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                                'employees',
                                'employees/index',
                                'employees/create',
                                'employees/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/employees'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Employees</span>
                        </a>
                    </li>
                    <li>
                       <a class="app-menu__item <?php echo (in_array($current_url, [
                               'customers',
                               'customers/index',
                               'customers/create',
                               'customers/update'
                       ]))?'active':'' ?>" href="<?= $base_url.'/customers'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Customers</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                                'vendors',
                                'vendors/index',
                                'vendors/create',
                                'vendors/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/vendors'; ?>">
                            <span class="icons_blue">
                                <i class="fa fa-industry" aria-hidden="true"></i>
                            </span>
                            <span class="icons_white">
                                <i class="fa fa-industry" aria-hidden="true"></i>
                            </span>
                            <span class="app-menu__label">Vendors</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item <?php echo (in_array($current_url, [
                            'contact-enquiries',
                            'contact-enquiries/index',
                            'contact-enquiries/create',
                            'contact-enquiries/update'
                        ]))?'active':'' ?>" href="<?= $base_url.'/contact-enquiries'; ?>">
                        <span class="icons_blue">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                            <span class="icons_white">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                            <span class="app-menu__label">Contact Enquiries</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </aside>
        </div>
    </section>
    <!-- Sidebar Area Closed-->
