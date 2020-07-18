<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_vars_rows".
 *
 * @property int $id
 * @property int $product_id
 * @property int $regular_price
 * @property int $sale_price
 *
 * @property Products $product
 * @property ProductsVarsRowsItems[] $productsVarsRowsItems
 */
class ProductsVarsRows extends \yii\db\ActiveRecord
{
    public $MinSP;
    public $MaxSP;
    public $MinRP;
    public $MaxRP;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_vars_rows';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id','regular_price','sale_price'], 'required'],
            [['product_id','regular_price','sale_price'], 'integer'],
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
            'product_id' => 'Product ID',
            'regular_price' => 'Regular Price',
            'sale_price' => 'Sale Price',
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

    /**
     * Gets query for [[ProductsVarsRowsItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsVarsRowsItems()
    {
        return $this->hasMany(ProductsVarsRowsItems::className(), ['row_id' => 'id']);
    }
}
