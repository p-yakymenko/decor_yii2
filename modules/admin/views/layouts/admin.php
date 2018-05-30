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

	<title>Админ-панель | <?= Html::encode($this->title) ?></title>
	
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
					<a class="logo" href="<?= \yii\helpers\Url::home()?>">
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
								<img src="/img/account.jpg" alt="" height="42" width="42">
								
							</div>
							<strong class="text-uppercase">Мой аккаунт <i class="fa fa-caret-down"></i></strong>
						</div>
						<a href="#" class="text-uppercase" style="font-size: 10px;">Войти</a> / <a href="#" class="text-uppercase" style="font-size: 10px" >Создать</a>
						<ul class="custom-menu">
							<li><a href="#"><i class="fa fa-user-o"></i> Мой аккант</a></li>
							<li><a href="#"><i class="fa fa-heart-o"></i> Список желаний</a></li>
							<li><a href="#"><i class="fa fa-exchange"></i> Сравнение</a></li>
							<li><a href="#"><i class="fa fa-check"></i> Посчитать</a></li>
							<li><a href="#"><i class="fa fa-unlock-alt"></i> Войти</a></li>
							<li><a href="#"><i class="fa fa-user-plus"></i> Создать аккаунт</a></li>
						</ul>
					</li>
					<!-- /Account -->

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
			<!-- menu nav -->
			<div class="menu-nav">
				<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
				<ul class="menu-list">
					<li><a href="<?=\yii\helpers\Url::to(['/admin']) ?>">Главная</a></li>
					<li class="dropdown default-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Категории <i class="fa fa-caret-down"></i></a>
						<ul class="custom-menu">
							<li><a href="<?=\yii\helpers\Url::to(['category/index']) ?>">Список категорий</a></li>
							<li><a href="<?=\yii\helpers\Url::to(['category/create']) ?>">Добавить категорию</a></li>
						</ul>
					</li>
					<li class="dropdown default-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Товары <i class="fa fa-caret-down"></i></a>
						<ul class="custom-menu">
							<li><a href="<?=\yii\helpers\Url::to(['product/index']) ?>">Список товаров</a></li>
							<li><a href="<?=\yii\helpers\Url::to(['product/create']) ?>">Добавить товар</a></li>
						</ul>
					</li>
					<li><a href="#">Продажи</a></li>
					<li><a href="#">Доставка</a></li>		

					<?php if(!Yii::$app->user->isGuest): ?>
						<li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Выход)</a></li>
					<?php endif;?>
				</ul>
			</div>
			<!-- menu nav -->
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /NAVIGATION -->

<div class="container">
	<?php if( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo Yii::$app->session->getFlash('success'); ?>
		</div>
	<?php endif;?>
	<br>
	<?= $content; ?>
</div>

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