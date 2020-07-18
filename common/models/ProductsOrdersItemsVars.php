<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_orders_items_vars".
 *
 * @property int $id
 * @property int $product_var_id
 * @property int $product_id
 * @property int $sale_price
 * @property int $regular_price
 * @property string $var_rows_json_data
 *
 * @property Products $product
 */
class ProductsOrdersItemsVars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders_items_vars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_var_id', 'product_id', 'sale_price', 'regular_price', 'var_rows_json_data'], 'required'],
            [['product_var_id', 'product_id', 'sale_price', 'regular_price'], 'integer'],
            [['var_rows_json_data'], 'string'],
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
            'product_var_id' => 'Product Var ID',
            'product_id' => 'Product ID',
            'sale_price' => 'Sale Price',
            'regular_price' => 'Regular Price',
            'var_rows_json_data' => 'Var Rows Json Data',
        ];
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
