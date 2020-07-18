<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_reviews".
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string|null $review_title
 * @property string|null $review_message
 * @property int|null $review_value
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Products $product
 * @property User $user
 */
class ProductsReviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_title', 'review_message','review_value'], 'required'],
            [['product_id', 'user_id', 'review_value'], 'integer'],
            [['review_message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['review_title'], 'string', 'max' => 256],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'review_title' => 'Review Title',
            'review_message' => 'Review Message',
            'review_value' => 'Review Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
