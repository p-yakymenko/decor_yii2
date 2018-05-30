<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>	
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
			<li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></li>
			<li class="active"><?= $product->name?></li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();
?>

<?php
    $url =  strrev($mainImg->getUrl());
    $str = strpos($url, "?");
    $url = '/yii2images/images/image-by-item-and-alias?'.strrev(substr($url, 0, $str));
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--  Product Details -->
			<div class="product product-details clearfix">
				<div class="col-md-6">
					<div id="product-main-view">
						<div class="product-view">
							<?= Html::img($url, ['alt' => $product->name])?>
						</div>
					</div>
					<div id="product-view">
						<div class="product-view">
							<?= Html::img($url, ['alt' => $product->name])?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-body">
						<div class="product-label">
                                    <?php if($product->new): ?>
                                        <span>New</span>
                                    <?php endif; ?>
                                    <?php if($product->sale): ?>
                                        <span class="sale">-20%</span>
                                    <?php endif; ?>
                                </div>
						<h2 class="product-name"><?= $product->name?></h2>
						<h3 class="product-price">$<?= $product->price?> <del class="product-old-price">$<?= $product->price?></del></h3>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<a href="#">3 Отзыв(а) / Добавить Отзыв</a>
						</div>
						<p><strong>Наличие:</strong> В Наличии</p>
						<p><strong>Альбом:</strong> <?= $product->category->name?></p>
						<p><?= $product->content?></p>
						<div class="product-options">
							<!--
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul>
							-->
						</div>

						<div class="product-btns">
							<div class="qty-input">
								<span class="text-uppercase">Кол-во: </span>
								<input class="input" type="number">
							</div>
							<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" class="btn primary-btn add-to-cart" data-id="<?= $product->id?>"><i class="fa fa-shopping-cart"></i> В Корзину</a>
							<div class="pull-right">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="product-tab">
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Описание</a></li>
							<li><a data-toggle="tab" href="#tab1">Детали</a></li>
							<li><a data-toggle="tab" href="#tab2">Отзывы (3)</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
								irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<div id="tab2" class="tab-pane fade in">

								<div class="row">
									<div class="col-md-6">
										<div class="product-reviews">
											<div class="single-review">
												<div class="review-heading">
													<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
													<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
													<div class="review-rating pull-right">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
													irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
												</div>
											</div>

											<div class="single-review">
												<div class="review-heading">
													<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
													<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
													<div class="review-rating pull-right">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
													irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
												</div>
											</div>

											<div class="single-review">
												<div class="review-heading">
													<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
													<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
													<div class="review-rating pull-right">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
													irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
												</div>
											</div>

											<ul class="reviews-pages">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="col-md-6">
										<h4 class="text-uppercase">Write Your Review</h4>
										<p>Your email address will not be published.</p>
										<form class="review-form">
											<div class="form-group">
												<input class="input" type="text" placeholder="Your Name" />
											</div>
											<div class="form-group">
												<input class="input" type="email" placeholder="Email Address" />
											</div>
											<div class="form-group">
												<textarea class="input" placeholder="Your review"></textarea>
											</div>
											<div class="form-group">
												<div class="input-rating">
													<strong class="text-uppercase">Your Rating: </strong>
													<div class="stars">
														<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
														<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
														<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
														<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
														<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
													</div>
												</div>
											</div>
											<button class="primary-btn">Submit</button>
										</form>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /Product Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
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
					<h2 class="title">Подборка для вас</h2>
				</div>
			</div>
			<!-- section title -->

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
	</div>
	<!-- /container -->
</div>
	<!-- /section -->