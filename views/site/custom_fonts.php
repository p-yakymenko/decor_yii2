<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>

<?php
$custom_fonts_directory = '/web/custom-fonts';
$fonts_array = scandir($_SERVER['DOCUMENT_ROOT'].$custom_fonts_directory);

$array_length = count($fonts_array);

		// Перебираем все шрифты и делаем чистый массив
$fonts_count = 0;
$custom_fonts = [];
for($i = 2; $i <= $array_length-1; $i++){
			// Получаем название
	$data_dump = explode(".", $fonts_array[$i]);
	$current_font_name = $data_dump[0];
	?>
	<style>
	@font-face {
		font-family: <?= $current_font_name ?>; 
		src: url(<?= \yii\helpers\Url::to('web/custom-fonts/', true).$fonts_array[$i] ?>);
	}	
</style>

<?php
$custom_fonts[$fonts_count] = $current_font_name;
$fonts_count += 1;
		} // end for
		
		?>		

		<!-- BREADCRUMB -->
		<div id="breadcrumb">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
					<li class="active">Выбор Шрифта</li>
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
					<!-- Блок с шрифтами -->
					<div class="product product-details clearfix">
						<div class="col-md-6">
							<div class="product-body">
								<div class="product-label">
								<!-- <span class="sale">New</span>
									<span>Название Шрифта</span> -->
								</div>
								<h2 class="product-name">Введите текст</h2>
								<input class="input" type="#" id="textSampleField" placeholder="Тестовый текст">
								<!-- <button class="primary-btn add-to-cart"><i class="#"></i>Применить</button> -->
								<div class="container">
									<hr>
									<form>
										<h3>Вариации шрифтов</h3>
										<?php
										$c_font_counter = 0;
										foreach($custom_fonts as $custom_font){ ?>
											<div class="radio">
												<label><input type="radio" name="optradio"><div id="fontShocaseBox<?= $c_font_counter ?>" style="font-family: <?= $custom_font ?>; font-size: 24px;">Тестовая надпись</div></label>
											</div>
											<?php
											$c_font_counter += 1;
	} // end foreach
	?>

</form>
<script>
	function updateTextSamples(){
		
		var sampleText = document.getElementById('textSampleField').value;
		
		for(var cFontCounter = 0; cFontCounter < 33; cFontCounter++){
			var textFontSample = document.getElementById('fontShocaseBox'+cFontCounter);
			textFontSample.innerHTML = sampleText;
			
		}
		
		
		
	}
	
	var sampleTextField = document.getElementById('textSampleField');
	sampleTextField.addEventListener("keydown", updateTextSamples, false);
	sampleTextField.addEventListener("change", updateTextSamples, false);
</script>

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


