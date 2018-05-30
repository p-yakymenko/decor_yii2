<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner01.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h1>Распродажа</h1>
                        <h3 class="white-color font-weak">Скидки до 50%</h3>
                        <button class="primary-btn">Купить</button>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner02.jpg" alt="">
                    <div class="banner-caption">
                        <h1 class="primary-color">Горячее предложение<br><span class="white-color font-weak">Скидки до 50%</span></h1>
                        <button class="primary-btn">Купить</button>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner03.jpg" alt="">
                    <div class="banner-caption">
                        <h1 class="white-color">Новые товары<span></span></h1>
                        <button class="primary-btn">Купить</button>
                    </div>
                </div>
                <!-- /banner -->
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Скидки</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner14.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">БЛОГ<br></h2>
                        <button class="primary-btn">Читать</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-1" class="product-slick">

                        <!-- Product Single -->
                        <?php if( !empty($sales) ): ?>
                            <?php foreach($sales as $sale): ?>
                                <?php $mainImg = $sale->getImage();?>
                                <?php
                                $url =  strrev($mainImg->getUrl());
                                $str = strpos($url, "?");
                                $url = '/yii2images/images/image-by-item-and-alias?'.strrev(substr($url, 0, $str));
                                ?>
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <?php if($sale->new): ?>
                                                <span>New</span>
                                            <?php endif; ?>
                                            <?php if($sale->sale): ?>
                                                <span class="sale">-20%</span>
                                            <?php endif; ?>
                                        </div>
                                        <?= Html::img($url, ['alt' => $sale->name])?>                                       
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">$<?= $sale->price?> <del class="product-old-price">$<?= (float)$sale->price?></del></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o empty"></i>
                                        </div>
                                        <h2 class="product-name"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale->id]) ?>"><?= $sale->name?></a></h2>
                                        <div class="product-btns">
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> в корзину</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endif; ?>
                        <!-- /Product Single -->

                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->

        <!-- row -->

        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->

<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Последние продукты</h2>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <?php if( !empty($news) ): ?>
                <?php foreach($news as $new): ?>
                    <?php $mainImg = $new->getImage();?>
                    <?php
                    $url =  strrev($mainImg->getUrl());
                    $str = strpos($url, "?");
                    $url = '/yii2images/images/image-by-item-and-alias?'.strrev(substr($url, 0, $str));
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <?php if($new->new): ?>
                                        <span>New</span>
                                    <?php endif; ?>
                                    <?php if($new->sale): ?>
                                        <span class="sale">-20%</span>
                                    <?php endif; ?>
                                </div>
                                <?= Html::img($url, ['alt' => $new->name])?>                                       
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$<?= $new->price?> <del class="product-old-price">$<?= (float)$new->price?></del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>"><?= $new->name?></a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> в корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif; ?>
            <!-- /Product Single -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="/img/banner15.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">У нас<br>Акция</h2>
                        <button class="primary-btn">Узнать больше</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->

            <!-- Product Single -->
            <?php if( !empty($hits) ): ?>
                <?php foreach($hits as $hit): ?>
                    <?php $mainImg = $hit->getImage();?>
                    <?php
                    $url =  strrev($mainImg->getUrl());
                    $str = strpos($url, "?");
                    $url = '/yii2images/images/image-by-item-and-alias?'.strrev(substr($url, 0, $str));
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <?php if($hit->new): ?>
                                        <span>New</span>
                                    <?php endif; ?>
                                    <?php if($hit->sale): ?>
                                        <span class="sale">-20%</span>
                                    <?php endif; ?>
                                </div>
                                <?= Html::img($url, ['alt' => $hit->name])?>                                       
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$<?= $hit->price?> <del class="product-old-price">$<?= (float)$hit->price?></del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> в корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif; ?>
            <!-- /Product Single -->
        </div>
        <!-- /row -->

        <!-- row -->
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
    <!-- /section -->