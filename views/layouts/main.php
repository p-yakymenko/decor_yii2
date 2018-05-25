<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>

	<title><?= Html::encode($this->title) ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="icon" type="image/png" href="/img/favicon.png" />
		<?php $this->head() ?>
	</head>

	<body>
		<?php $this->beginBody() ?>
		<!-- HEADER -->
		<header>
			<!-- header -->
			<div id="header">
				<div class="container">
					<div class="pull-left">
						<!-- Logo -->
						<div class="header-logo">
							<a class="logo-icon"><img src="/img/iconlogo.png" alt="" height="75" width="75"></a>
							<a class="logo" href="<?= \yii\helpers\Url::home() ?>">
								<img src="/img/logo.png" alt="">
							</a>
						</div>
						<!-- /Logo -->
					</div>
					<div class="pull-right">
						<ul class="header-btns">
							<!-- Account -->
							<li class="header-account dropdown default-dropdown">
								<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<img src="/img/account.png" alt="" height="40" width="40">
									</div>
									<strong class="text-uppercase">Мой аккант <i class="fa fa-caret-down"></i></strong>
								</div>
								<a href="#" class="text-uppercase" style="font-size: 10px;">Войти</a> / <a href="#" class="text-uppercase" style="font-size: 10px" >Создать</a>
								<ul class="custom-menu">
									<li><a href="#"><i class="fa fa-user-o"></i> Мой аккаунт</a></li>
									<li><a href="#"><i class="fa fa-heart-o"></i> Список желаний</a></li>
									<li><a href="#"><i class="fa fa-exchange"></i> Сравнение</a></li>
									<li><a href="#"><i class="fa fa-check"></i> Посчитать</a></li>
									<li><a href="#"><i class="fa fa-unlock-alt"></i> Войти</a></li>
									<li><a href="#"><i class="fa fa-user-plus"></i> Создать аккаунт</a></li>
								</ul>
							</li>
							<!-- /Account -->

							<!-- Cart -->
							<li class="header-cart dropdown default-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<img src="/img/cart.png" alt="" height="40" width="40">
										<span class="qty">3</span>
									</div>
									<strong class="text-uppercase">Моя коризна:</strong>
									<br>
									<span>35.20$</span>
								</a>
								<div class="custom-menu">
									<div id="shopping-cart">
										<div class="shopping-cart-list">
											<div class="product product-widget">
												<div class="product-thumb">
													<img src="/img/thumb-product01.jpg" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
													<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
												</div>
												<button class="cancel-btn"><i class="fa fa-trash"></i></button>
											</div>
											<div class="product product-widget">
												<div class="product-thumb">
													<img src="/img/thumb-product01.jpg" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
													<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
												</div>
												<button class="cancel-btn"><i class="fa fa-trash"></i></button>
											</div>
										</div>
										<div class="shopping-cart-btns">
											<button class="main-btn">View Cart</button>
											<button class="primary-btn"><a href="./checkout.html" >Checkout</a> <i class="fa fa-arrow-circle-right"></i></button>
										</div>
									</div>
								</div>
							</li>
							<!-- /Cart -->

							<!-- Mobile nav toggle-->
							<li class="nav-toggle">
								<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
							</li>
							<!-- / Mobile nav toggle -->
						</ul>
					</div>
				</div>
				<!-- header -->
			</div>
			<!-- container -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<div id="navigation">
			<!-- container -->
			<div class="container">
				<div id="responsive-nav">
					<!-- category nav -->

					<div class="category-nav btn-group">
						<span class="category-header dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">Альбомы
							<i class="fa fa-list"></i>
						</span>
						<ul class="category-list dropdown-menu">

							<?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>

							<li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => '-1']) ?>">Смотреть все</a></li>
						</ul>
					</div>
					<!-- /category nav -->

					<!-- menu nav -->
					<div class="menu-nav">
						<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
						<ul class="menu-list">
							<li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
							<li><a href="#">Альбомы</a></li>
							<li><a href="<?= \yii\helpers\Url::to('site/custom-fonts',true)?>">Шрифты</a></li>
							<li><a href="#">Доставка</a></li>
							<li><a href="#">Контакты</a></li>
							<li><a href="#">Отзывы</a></li>
							<li><a href="#"> </a></li>
							<li><a href="#"> </a></li>
							<li><a href="#"> </a></li>
							<li><a href="#"><img src="/img/social/fb.png" alt="" height="20" width="20"></a></li>
							<li><a href="#"><img src="/img/social/vk.png" alt="" height="20" width="20"></a></li>
							<li><a href="#"><img src="/img/social/inst.png" alt="" height="20" width="20"></a></li>
						</ul>
					</div>
					<!-- /menu nav -->
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /NAVIGATION -->

		<?= $content; ?>

		<!-- FOOTER -->
		<footer id="footer" class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- footer widget -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="footer">
							<!-- footer logo -->
							<div class="footer-logo">
								<a class="logo" href="#">
									<img src="/img/logo.png" alt="">
								</a>
							</div>
							<!-- /footer logo -->

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

							<!-- footer social -->
							<ul class="footer-social">
								<li><a href="#"><img src="/img/social/fb.png" alt="" height="32" width="32"></a></li>
								<li><a href="#"><img src="/img/social/vk.png" alt="" height="32" width="32"></a></li>
								<li><a href="#"><img src="/img/social/inst.png" alt="" height="32" width="32"></a></li>
							</ul>
							<!-- /footer social -->
						</div>
					</div>
					<!-- /footer widget -->

					<!-- footer widget -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="footer">
							<h3 class="footer-header">Мой аккаунт</h3>
							<ul class="list-links">
								<li><a href="#">Мой аккаунт</a></li>
								<li><a href="#">Список желаний</a></li>
								<li><a href="#">Сравнить</a></li>
								<li><a href="#">Посчитать</a></li>
								<li><a href="#">Войти</a></li>							
							</ul>
						</div>
					</div>
					<!-- /footer widget -->

					<div class="clearfix visible-sm visible-xs"></div>

					<!-- footer widget -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="footer">
							<h3 class="footer-header">Клиентам</h3>
							<ul class="list-links">
								<li><a href="#">Главная</a></li>
								<li><a href="#">Разделы</a></li>
								<li><a href="#">Шрифты</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div>
					<!-- /footer widget -->

					<!-- footer subscribe -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="footer">
							<h3 class="footer-header">Рассылка</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
							<form>
								<div class="form-group">
									<input class="input" placeholder="Введите E-Mail">
								</div>
								<button class="primary-btn">Подписаться на рассылку</button>
							</form>
						</div>
					</div>
					<!-- /footer subscribe -->
				</div>
				<!-- /row -->
				<hr>
				<!-- row -->
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<!-- footer copyright -->
						<div class="footer-copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
						<!-- /footer copyright -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /FOOTER -->
		<?php $this->endBody() ?>
	</body>

	</html>
	<?php $this->endPage() ?>