<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
				<li class="active">Корзина</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">

	<?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
			
			<!-- row -->
			<div class="row">

					<?php $form = ActiveForm::begin(['id' => 'checkout-form'])?>
					
					<div class="col-md-6">
						<div class="billing-details">
							<!-- <p>Уже зарегистрированы? <a href="#">Войти</a></p> -->
							<div class="section-title">
								<h3 class="title">Платежные реквизиты</h3>
							</div>
							<?= $form->field($order, 'first_name')->textInput(['autofocus' => true,'placeholder' => $order->getAttributeLabel( 'first_name' )])?>
                            <?= $form->field($order, 'last_name')->textInput(['placeholder' => $order->getAttributeLabel( 'last_name' )])?>
                            <?= $form->field($order, 'email')->textInput(['placeholder' => $order->getAttributeLabel( 'email' )])?>
                            <?= $form->field($order, 'address')->textInput(['placeholder' => $order->getAttributeLabel( 'address' )])?>
                            <?= $form->field($order, 'city')->textInput(['placeholder' => $order->getAttributeLabel( 'city' )])?>
                            <?= $form->field($order, 'country')->textInput(['placeholder' => $order->getAttributeLabel( 'country' )])?>
                            <?= $form->field($order, 'post_index')->textInput(['placeholder' => $order->getAttributeLabel( 'post_index' )])?>
                            <?= $form->field($order, 'phone')->textInput(['placeholder' => $order->getAttributeLabel( 'phone' )])?>

							<!-- <div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Создать аккаунт?</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
											<p>
												<input class="input" type="password" name="password" placeholder="Введите пароль">
									</div>
								</div>
							</div> -->
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Методы доставки</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked value="0.00">
								<label for="shipping-1">Метод 1 -  <span>0.00$</span></label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2" value="4.00">
								<label for="shipping-2">Метод 2 - <span>4.00$<span></label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Методы оплаты</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Банковский перевод</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Метод 2</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Метод 3 </label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Обзор заказа</h3>
							</div>

							<?php if(!empty($session['cart'])): ?>
							
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Товар</th>
										<th></th>
										<th class="text-center">Цена</th>
										<th class="text-center">Кол-во</th>
										<th class="text-center">Сумма</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>

									<?php foreach($session['cart'] as $id => $item):?>
									
									<tr data-id="<?= $id?>">
										<td class="thumb">
											<?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?>											
										</td>
										<td class="details">
											<a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a>
											<ul>
												<li><span>Шрифт: <?= $item['font']?></span></li>
												<li><span>Надпись: <?= $item['text']?></span></li>
											</ul>
										</td>
										<td class="price text-center"><strong><?= $item['price']?>$</strong>
											<br><del class="font-weak"><small><?= $item['price']?>$</small></del>
										</td>
										<td class="qty text-center"><?= $item['qty']?></td>
										<td class="total text-center"><strong class="primary-color"><?= $item['qty']*$item['price']?>$</strong>
										</td>
										<td class="text-right">
											<span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
										</td>
									</tr>
								
								<?php endforeach?>
								
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Общая сумма</th>
										<th colspan="2" class="sub-total"><?= $session['cart.sum']?>$</th>
									</tr>
									<tr class="shipping">
										<th class="empty" colspan="3"></th>
										<th>Доставка</th>
										<td colspan="2"></td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Сумма</th>
										<th colspan="2" class="total">											
										</th>
									</tr>
								</tfoot>
							</table>
							<input type="hidden" name="shipping">
							<div class="pull-right">
								<?= Html::submitButton('Заказать', ['class' => 'primary-btn'])?>
							</div>

							<?php else: ?>
                                 <h3>Корзина пуста</h3>
                            <?php endif;?>
						
						</div>
					</div>

					<?php ActiveForm::end()?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->