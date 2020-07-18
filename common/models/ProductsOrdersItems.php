<?php

namespace common\models;
use common\models\ProductsOrders;
use common\models\Products;
use Yii;

/**
 * This is the model class for table "products_orders_items".
 *
 * @property int $id
 * @property int $products_orders_id
 * @property int $product_id
 * @property int $product_quantity
 * @property int $product_price
 * @property int $product_rprice
 * @property int $product_type 1 => Simple, 2 => Variable
 * @property int|null $product_variation_id
 * @property string|null $created_at
 *
 * @property ProductsOrders $productsOrders
 * @property Products $product
 */
class ProductsOrdersItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['products_orders_id', 'product_id'], 'required'],
            [['products_orders_id', 'product_id', 'product_quantity', 'product_price', 'product_rprice', 'product_type', 'product_variation_id'], 'integer'],
            [['created_at'], 'safe'],
            [['products_orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsOrders::className(), 'targetAttribute' => ['products_orders_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'products_orders_id' => 'Products Orders ID',
            'product_id' => 'Product ID',
            'product_quantity' => 'Product Quantity',
            'product_price' => 'Product Price',
            'product_rprice' => 'Product Rprice',
            'product_type' => 'Product Type',
            'product_variation_id' => 'Product Variation ID',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[ProductsOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders()
    {
        return $this->hasOne(ProductsOrders::className(), ['id' => 'products_orders_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
