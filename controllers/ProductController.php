<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController{

	public function actionView($id){
		$id = Yii::$app->request->get('id');
		$product = Product::findOne($id);
		$hits = Product::find()->where(['hit' => '1'])->limit(4)->all();
		$this->setMeta('Креативная мастерская | ' . $product->name, $product->keywords, $product->description);
		return $this->render('view', compact('product','hits'));
	}

} 