<?php
namespace common\helpers;

use common\models\ProductsVarsRows;
use Yii;
use common\models\Products;
use common\helpers\Utils;
use common\models\ProductsVariations;

class Cart
{

    /**
     * @return get all Items
     */
    public static function Items(){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
//         echo '<pre>';print_r($cartProduct);die;
        if( !empty($cartProduct)){
            foreach ($cartProduct as $k => $prod){
               // echo '<pre>';print_r($prod);die;
                $p = Products::find()->where(['id'=>$k])->select(
                    'title,slug,product_type,featured_image as image,product_sale_price as price,product_regular_price as rprice'
                )->asArray()->one();

                if( isset($prod['product_type']) && ($prod['product_type'] == '2') ){
                    $var = ProductsVarsRows::find()->where(['id' => $prod['var']['id']])->asArray()->one();
                    $cartProduct[$k]['price'] = $var['sale_price'];
                    $cartProduct[$k]['rprice'] = $var['regular_price'];
                }else {
                    $cartProduct[$k]['price'] = $p['price'];
                    $cartProduct[$k]['rprice'] = $p['rprice'];
                }
                $cartProduct[$k]['title'] = $p['title'];
                $cartProduct[$k]['slug'] =  $p['slug'];
                $cartProduct[$k]['image'] = Utils::IMG_URL($p['image']);
                $cartProduct[$k]['product_type'] = $p['product_type'];
            }
        }
        return $cartProduct;
    }

    /**
     * @param $product_id
     * @return array| get One Item
     */
    public static function Item( $product_id ){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        if( !empty($cartProduct) && isset( $cartProduct[$product_id] )){
            $product = $cartProduct[$product_id];
//            echo '<pre>';print_r($product);die;
            $one_prod = Products::find()->where(['id'=>$product_id])->select(
                'title,slug,featured_image as image,product_sale_price as price,product_regular_price as rprice'
            )->asArray()->one();
            $product['title'] = $one_prod['title'];
            $product['slug'] = $one_prod['slug'];
            $product['image'] = Utils::IMG_URL($one_prod['image']);

            $product['price'] = $one_prod['price'];
            $product['rprice'] = $one_prod['rprice'];

            if( isset($product['product_type']) && ($product['product_type'] == '2') ){
                $var = ProductsVarsRows::find()->where(['id' => $product['var']['id']])->asArray()->one();
                $product['price'] = $var['sale_price'];
                $product['rprice'] = $var['regular_price'];
            }else {
                $product['price'] = $one_prod['price'];
                $product['rprice'] = $one_prod['rprice'];
            }

            return $product;
        }else{
            return [];
        }
    }

    /**
     * @param $product_id
     * @return boolean| get Item is added in cart OR NOT
     */
    public static function ItemExist( $product_id ){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        //echo $product_id;echo '<pre>';print_r($cartProduct);die;
        if(!empty($cartProduct) && isset($cartProduct[$product_id])){
             return $cartProduct[$product_id];
        }else{
            return false;
        }
    }

    /**
     * @return int | get cart total sale price
     */
    public static function cartTotal(){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        $total = 0;
        if( !empty($cartProduct)){
            foreach ($cartProduct as $k => $prod){
                if($prod['product_type'] == '2'){
                    $p = ProductsVarsRows::find()->where(['id'=>$prod['var']['id']])->select(
                        'sale_price as price'
                    )->asArray()->one();
                    $total+= (intval($p['price'] ) * intval( $prod['quantity'] ));

                }else{
                    $p = Products::find()->where(['id'=>$k])->select(
                        'product_sale_price as price'
                    )->asArray()->one();
                    $total+= (intval($p['price'] ) * intval( $prod['quantity'] ));
                }
            }
        }
        return $total;
    }

    /**
     * @return int | get cart total regular price
     */
    public static function cartTotal2(){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        $total = 0;
        if( !empty($cartProduct)){
            foreach ($cartProduct as $k => $prod){
                if($prod['product_type'] == '2'){
                    $p = ProductsVarsRows::find()->where(['id'=>$prod['var']['id']])->select(
                        'regular_price as price'
                    )->asArray()->one();
                    $total+= (intval($p['price'] ) * intval( $prod['quantity'] ));
                }else{
                    $p = Products::find()->where(['id'=>$k])->select(
                        'product_regular_price as price'
                    )->asArray()->one();
                    $total+= (intval($p['price'] ) * intval( $prod['quantity'] ));
                }
            }
        }
        return $total;
    }

    /**
     * @return get all Items count
     */
    public static function cartItemsCount(){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        $count = 0;
        if( !empty($cartProduct)){
            $count = count( $cartProduct );
        }
        return $count;
    }

    public static function getAppliedCoupenCode(){
       $coupen_code = ( Yii::$app->session->get('coupen_code')!= null)
           ?Yii::$app->session->get('coupen_code')
           :null;
       return $coupen_code;
    }

    public static function getProductUserIds(){
        $cartProduct = ( Yii::$app->session->get('cart')!=null)?Yii::$app->session->get('cart'):array();
        $ids = array();
        foreach ($cartProduct as $k => $p){
            $prod = Products::find()->where(['id' => $k])->select('id,user_id')->asArray()->one();
            array_push($ids,$prod['user_id']);
        }
       return implode(',',$ids);
    }

    /**
     * function for get shipping charges
     * @return int
     */
    public static function shippingChaarges(){
        return 15;
    }

}