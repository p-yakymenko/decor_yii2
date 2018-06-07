<?php

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;

class CartController extends AppController{   

    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $font = Yii::$app->request->get('font');        
        $text = Yii::$app->request->get('text');
        $text = clean($text);
        $qty = Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $font, $text, $qty);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItemView(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $order = new Order();
        return $this->render('view', compact('session', 'order'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $shipping = 0;
        if ($_POST['shipping']) {
            $shipping = $_POST['shipping'];
        }        
        $session =Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if( $order->load(Yii::$app->request->post()) ){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum']+$shipping;
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id){
        $custom_fonts_directory = '/web/custom-fonts';
        $fonts_array = scandir($_SERVER['DOCUMENT_ROOT'].$custom_fonts_directory);
        $array_length = count($fonts_array);
        for($i = 2; $i <= $array_length-1; $i++){
            $data_dump = explode(".", $fonts_array[$i]);
            $current_font_name[] = $data_dump[0];
        }
        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = (int)$id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->text = $item['text'];
            $order_items->font = $current_font_name[(int)$item['font']-1];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }

} 