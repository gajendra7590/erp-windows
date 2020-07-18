<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Dashboard';
?>
<input type="hidden" id="BASE_URL" value="<?= Url::to(['/']);?>">
<input type="hidden" id="USER_ROLE" value="<?= Yii::$app->user->identity->role;?>">
<section id="card-counter-dash">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="<?= Url::to(['/products']);?>" title="View Experiences List">
                <div class="card-counter primary">
                    <i class="fa fa-product-hunt"></i>
                    <span class="count-numbers total_count total_exp_count">
                         <?= $total_product_count; ?>
                    </span>
                    <span class="count-name">Total Products</span>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="<?= Url::to(['/orders']);?>" title="View Orders List">
                <div class="card-counter danger">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="count-numbers total_count total_orders_count">
                        <?= $total_orders_count; ?>
                    </span>
                    <span class="count-name">Total Orders</span>
                </div>
            </a>
        </div>
        <?php if( (\Yii::$app->user->identity->role == '1') ) { ?>
        <div class="col-md-6 col-lg-3">
            <a href="<?= Url::to(['/customers']);?>" title="View Clients List">
                <div class="card-counter success">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers total_count total_users_count">
                        <?= $total_clients_count; ?>
                    </span>
                    <span class="count-name">Total Customers</span>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="<?= Url::to(['/vendors']);?>" title="View Vendors List">
                <div class="card-counter info">
                    <i class="fa fa-user"></i>
                    <span class="count-numbers total_counts total_vendors_count">
                        <?= $total_vendors_count; ?>
                    </span>
                    <span class="count-name">Total Vendors</span>
                </div>
            </a>
        </div>

        <?php } ?>


    </div>
</section>