<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Utils;
$this->title = 'ERP Windows - About US';
?>
<!-- main Content Area Start -->
<section class="inner__headbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blogs_banner">
                    <h1 class="fl-heading">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<main id="main__Content">
    <div class="hm__Block">
        <section class="white__Shade">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="pic_left">
                            <img src="<?= Url::to(['/theme/images/icons/unsplash-720x480.jpg']);?>" alt="About Us" />

                        </div>
                    </div>
                    <div class="col-sm-7">

                        <div class="cl__left about__para">
                            <h3>DROP-DEAD EASY BOOTSTRAP BLOG</h3>
                            <p>
                                Proin id eros arcu. Integer neque urna, malesuada vel iaculis ac,
                                elementum ut mauris. Proin auctor sapien eu lacus congue, tincidunt
                                luctus nisi egestas. Pellentesque venenatis risus id odio ullamcorper commodo.
                                Mauris pellentesque sapien commodo elit condimentum porta a at purus.
                            </p>
                            <p>
                                Nam vitae odio et augue semper ultrices. Vestibulum ut neque vel elit
                                commodo euismod. Morbi viverra sapien eu sapien ultricies egestas. Mauris
                                porta massa vitae euismod iaculis. Sed finibus enim eu eleifend suscipit.
                                Suspendisse molestie rutrum interdum.
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="off__Shade">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="same__Title">What We Can Offer</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="cl__left about__para">
                            <span class="fA__big"><i class="fa fa-clock-o"></i></span>
                            <h3> Free delivery during daytime</h3>
                            <p>
                                Proin auctor sapien eu lacus congue, tincidunt luctus nisi egestas.
                                Pellentesque venenatis risus id odio ullamcorper commodo.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="cl__left about__para">
                            <span class="fA__big"><i class="fa fa-dollar"></i></span>
                            <h3>For orders that cost $20 or more</h3>
                            <p>
                                Proin auctor sapien eu lacus congue, tincidunt luctus nisi egestas.
                                Pellentesque venenatis risus id odio ullamcorper commodo.
                            </p>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="cl__left about__para">
                            <span class="fA__big"><i class="fa fa-map-marker"></i></span>
                            <h3> Within the city (no suburbs)</h3>
                            <p>Proin auctor sapien eu lacus congue, tincidunt luctus nisi egestas. Pellentesque venenatis risus id odio ullamcorper commodo. </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <section class="back__Shade back__pos">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="big__para">
                            <p>Proin auctor sapien eu lacus congue, tincidunt luctus nisi egestas.
                                Pellentesque venenatis risus id odio ullamcorper commodo. The only
                                way to get better in longboarding is practicing. We cah help you learn
                                the basics.
                                <small>
                                    - Jack Robert</small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <?php echo $this->render('@app/views/layouts/contact_today_section'); ?>
        <div class="clearfix"></div>
        <!-- Home Client Area Closed -->
    </div>
</main>
<div class="clearfix"></div>
<!-- main Content Area Closed -->