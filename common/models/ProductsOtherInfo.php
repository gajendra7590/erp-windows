<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_other_info".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $tab_title
 * @property string|null $tab_content
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Products $product
 */
class ProductsOtherInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_other_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['tab_content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['tab_title'], 'string', 'max' => 256],
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
            'tab_title' => 'Tab Title',
            'tab_content' => 'Tab Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Before Save/Update Set Default values
    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
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
