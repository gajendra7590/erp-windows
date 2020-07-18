<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_order_status_activity".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_order_id
 * @property int $order_last_status
 * @property int $new_status
 * @property string $comment
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 * @property ProductsOrders $productOrder
 */
class ProductsOrderStatusActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_order_status_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_order_id', 'order_last_status', 'new_status', 'comment'], 'required'],
            [['user_id', 'product_order_id', 'order_last_status', 'new_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 256],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['product_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsOrders::className(), 'targetAttribute' => ['product_order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_order_id' => 'Product Order ID',
            'order_last_status' => 'Order Last Status',
            'new_status' => 'Order New Status',
            'comment' => 'Order Status Change Remark',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[ProductOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrder()
    {
        return $this->hasOne(ProductsOrders::className(), ['id' => 'product_order_id']);
    }
}
