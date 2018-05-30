<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController{

    public function actionView($id){
        $id = Yii::$app->request->get('id');

        if ($id == '-1') {
            $query = Product::find();
        }
        else{
            $query = Product::find()->where(['category_id' => $id]);
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $category = Category::findOne($id);        

        $name=(isset($category->name)) ? $category->name : 'Все товары';
        $this->setMeta('Креативная мастерская | ' . $name, $category->keywords, $category->description);       
        return $this->render('view', compact('products', 'pages','category'));

    }

} 