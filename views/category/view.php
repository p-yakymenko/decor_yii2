<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>	
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Главная</a></li>
			<li class="active">Товары</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside widget -->
				<div class="aside">
					<h3 class="aside-title">Сортировка:</h3>
					<ul class="filter-list">
						<li><span class="text-uppercase">Категории:</span></li>
						<li><a href="#" style="color:#FFF; background-color:#8A2454;">Кат_1</a></li>
						<li><a href="#" style="color:#FFF; background-color:#475984;">Кат_2</a></li>
						<li><a href="#" style="color:#FFF; background-color:#BF6989;">Кат_3</a></li>
						<li><a href="#" style="color:#FFF; background-color:#9A54D8;">Кат_4</a></li>
					</ul>

					<ul class="filter-list">
						<li><span class="text-uppercase">Тэги:</span></li>
						<li><a href="#">Тэг_1</a></li>
						<li><a href="#">Тэг_2</a></li>
					</ul>

					<ul class="filter-list">
						<li><span class="text-uppercase">Цена:</span></li>
						<li><a href="#">Мин: $20.00</a></li>
						<li><a href="#">Макс: $120.00</a></li>
					</ul>

					<button class="primary-btn">Очистить все</button>
				</div>
				<!-- /aside widget -->

				<!-- aside widget -->
				<div class="aside">
					<h3 class="aside-title">Цена</h3>
					<div id="price-slider"></div>
				</div>
				<!-- aside widget -->

				<!-- aside widget -->

				<!-- /aside widget -->

				<!-- aside widget -->
				<div class="aside">
					<h3 class="aside-title">Тэги:</h3>
					<ul class="size-option">
						<li class="active"><a href="#">Тэг_1</a></li>
						<li class="active"><a href="#">Тэг_2</a></li>
						<li><a href="#">SL</a></li>
					</ul>
				</div>
				<!-- /aside widget -->

				<!-- aside widget -->
				
				<!-- /aside widget -->

				<!-- aside widget -->
				<div class="aside">
					<h3 class="aside-title">Категории</h3>
					<ul class="list-links">
						<li class="active"><a href="#">Кат_1</a></li>
						<li><a href="#">Кат_2</a></li>
					</ul>
				</div>
				<!-- /aside widget -->

				<!-- aside widget -->
				<div class="aside">
					<h3 class="aside-title">Популярные продукты</h3>
					<!-- widget product -->
					<div class="product product-widget">
						<div class="product-thumb">
							<img src="/img/thumb-product01.jpg" alt="">
						</div>
						<div class="product-body">
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
						</div>
					</div>
					<!-- /widget product -->

					<!-- widget product -->
					<div class="product product-widget">
						<div class="product-thumb">
							<img src="/img/thumb-product01.jpg" alt="">
						</div>
						<div class="product-body">
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
						</div>
					</div>
					<!-- /widget product -->
				</div>
				<!-- /aside widget -->
			</div>
			<!-- /ASIDE -->

			<!-- MAIN -->
			<div id="main" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="row-filter">
							<a href="#"><i class="fa fa-th-large"></i></a>
							<a href="#" class="active"><i class="fa fa-bars"></i></a>
						</div>
						<div class="sort-filter">
							<span class="text-uppercase">Сортировка:</span>
							<select class="input">
								<option value="0">Цена</option>
								<option value="0">Рейтинг</option>
							</select>
							<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
					<div class="pull-right">
						<div class="page-filter">
							<span class="text-uppercase">Показывать:</span>
							<select class="input">
								<option value="0">10</option>
								<option value="1">20</option>
								<option value="2">30</option>
							</select>
						</div>
						<ul class="store-pages">
							<li><span class="text-uppercase">Страница:</span></li>
							<li class="active">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /store top filter -->

				<!-- STORE -->
				<div id="store">
					<!-- row -->
					<div class="row">

						<?php if(!empty($products)): ?>
							<?php $i = 0; foreach($products as $product): ?>

							<!-- Product Single -->					
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<?php if($product->new): ?>
												<span>New</span>
											<?php endif; ?>
											<?php if($product->sale): ?>
												<span class="sale">-20%</span>
											<?php endif; ?>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>

										<?= Html::img("@web/img/{$product->img}", ['alt' => $product->name])?>
										
									</div>
									<div class="product-body">
										<h3 class="product-price">$<?= $product->price?> <del class="product-old-price">$<?= $product->price?></del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#"><?= $product->name?></a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /Product Single -->

							<?php $i++?>
							<?php if($i % 3 == 0): ?>
								<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>
							<?php endif;?>
						<?php endforeach;?>
						<?php else :?>
							<h2>Здесь товаров пока нет...</h2>
						<?php endif;?>

					</div>
					<!-- /row -->
				</div>
				<!-- /STORE -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="row-filter">
							<a href="#"><i class="fa fa-th-large"></i></a>
							<a href="#" class="active"><i class="fa fa-bars"></i></a>
						</div>
						<div class="sort-filter">
							<span class="text-uppercase">Сортировка:</span>
							<select class="input">
								<option value="0">Цена</option>
								<option value="0">Рейтинг</option>
							</select>
							<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
					<div class="pull-right">
						<div class="page-filter">
							<span class="text-uppercase">Показывать:</span>
							<select class="input">
								<option value="0">10</option>
								<option value="1">20</option>
								<option value="2">30</option>
							</select>
						</div>
						<ul class="store-pages">
							<li><span class="text-uppercase">Страница:</span></li>
							<li class="active">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /MAIN -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
	<!-- /section -->