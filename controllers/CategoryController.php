<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController{

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if ($id == '-1') {
        	$products = Product::find()->all();
        }
        else{
        	$products = Product::find()->where(['category_id' => $id])->all();
        }
        $name=(isset($category->name)) ? $category->name : 'Все товары';
        $this->setMeta('Креативная мастерская | ' . $name, $category->keywords, $category->description);       
        return $this->render('view', compact('products','category'));

    }

} 