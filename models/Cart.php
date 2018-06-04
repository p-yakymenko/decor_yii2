<?php

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

	public function addToCart($product, $font, $text, $qty){

		$mainImg = $product->getImage();
		$url =  strrev($mainImg->getUrl('x50'));
		$str = strpos($url, "?");
		$url = '/yii2images/images/image-by-item-and-alias?'.strrev(substr($url, 0, $str));
		
		if(isset($_SESSION['cart'][$product->id.'&'.$font.$text])){
			$_SESSION['cart'][$product->id.'&'.$font.$text]['qty'] += $qty;
		}else{
			$_SESSION['cart'][$product->id.'&'.$font.$text] = [
				'qty' => $qty,
				'name' => $product->name,
				'price' => $product->price,
				'img' => $url,
				'font' => $font,
				'text' => $text,
			];
		}
		$_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
		$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
	}

	public function recalc($id){
		if(!isset($_SESSION['cart'][$id])) return false;
		$qtyMinus = $_SESSION['cart'][$id]['qty'];
		$sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
		$_SESSION['cart.qty'] -= $qtyMinus;
		$_SESSION['cart.sum'] -= $sumMinus;
		unset($_SESSION['cart'][$id]);
	}

} 