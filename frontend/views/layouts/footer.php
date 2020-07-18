<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
?>
<!-- Footer Area Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="fter__Item">
                    <h5>ERP-Windows</h5>
                    <ul class="fter__List">
                        <li><a href="javascript:void(0);">careers</a></li>
                        <li><a href="javascript:void(0);">news</a></li>
                        <li><a href="javascript:void(0);">policies</a></li>
                        <li><a href="javascript:void(0);">diversity & belonging</a></li>
                        <li><a href="javascript:void(0);">accessibility</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="fter__Item">
                    <h5>Our Services</h5>
                    <ul class="fter__List">
                        <li><a href="#">Steel Doors</a></li>
                        <li><a href="#">Commercial Wood Doors</a></li>
                        <li><a href="#">Metal Door Frames & Borrowed Lite Window Frames</a></li>
                        <li><a href="#">Door Hardware</a></li>
                        <li><a href="#">Door Louvers, Lite Kits, Safety & Fire Rated Glass</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="fter__Item">
                    <h5>Resources</h5>
                    <ul class="fter__List">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Steel Doors 101 </a></li>
                        <li><a href="#">Commercial Doors </a></li>
                        <li><a href="#">Metal Doors</a></li>
                        <li><a href="#">Hollow Metal Door Frames</a></li>
                        <li><a href="#">Commercial Wood / Solid Core Doors </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="fter__Item">
                    <h5>Support</h5>
                    <ul class="fter__List">
                        <li>
                            <a title="Contact US for help" href="<?= Url::to(['/contact-us']);?>">Help</a>
                        </li>
                        <li>
                            <a title="Email US for support" href="mailto:<?= isset(Yii::$app->params['supportEmail'])?Yii::$app->params['supportEmail']:'';?>">
                                <?= isset(Yii::$app->params['supportEmail'])?Yii::$app->params['supportEmail']:'';?>
                            </a>
                            <span>new</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="fter__Bottom">
                    <div class="fter__Bottom--Coupyrgt"> <span>&copy; <?php echo date('Y');?> ERP-Windows, All rights reserved.</span>
                        <ul class="fter__Bottom--list">
                            <li><a href="<?= Url::to(['/terms-and-conditions']);?>">terms <i class="fa fa-circle" aria-hidden="true"></i></a></li>
                            <li><a href="<?= Url::to(['/privacy-policy']);?>">privacy</a></li>
                        </ul>
                    </div>
                    <div class="fter__Social--Item">
                        <ul class="list-inline">
                            <li>
                                <a href="<?= Yii::$app->params['social_link']['google'];?>">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->params['social_link']['facebook'];?>">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->params['social_link']['twitter'];?>">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->params['social_link']['linkedin'];?>">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->params['social_link']['instagram'];?>">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<!-- Footer Area Closed -->