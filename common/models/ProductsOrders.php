<?php

namespace common\models;
use common\models\User;
use common\models\ProductsOrdersItems;


use Yii;

/**
 * This is the model class for table "products_orders".
 *
 * @property int $id
 * @property int $payment_id
 * @property int $user_id
 * @property int $cart_total
 * @property string|null $coupen_code
 * @property int $delhivery_charges
 * @property string|null $booking_date
 * @property string|null $expected_delhivery_date
 * @property string|null $order_prod_uid
 * @property int $order_status
 * @property string|null $created_at
 *
 * @property ProductsPayment $payment
 * @property User $user
 * @property ProductsOrdersStatus $productsOrdersStatus
 * @property ProductsOrdersItems $productsOrdersItems
 * @property ProductsOrdersShippingAddress $shippingAddress
 */
class ProductsOrders extends \yii\db\ActiveRecord
{
    public $total_pay;
    public $totalCartItems;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'user_id','cart_total','delhivery_charges','booking_date','expected_delhivery_date'], 'required'],
            [['payment_id', 'user_id','cart_total','delhivery_charges'], 'integer'],
            [['coupen_code','order_prod_uid'], 'string', 'max' => 100],
            [['created_at'], 'safe'],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsPayment::className(), 'targetAttribute' => ['payment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['order_status'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsOrdersStatus::className(), 'targetAttribute' => ['order_status' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'user_id' => 'User ID',
            'cart_total' => 'Cart Total',
            'coupen_code' => 'Coupen Code',
            'delhivery_charges' => 'Delhivery Charges',
            'booking_date' => 'Booking Date',
            'expected_delhivery_date' => 'Expected Delhivery Date',
            'created_at' => 'Created At',
        ];
    }


    // Before Save/Update Set Default values
    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function afterFind(){
        parent::afterFind();
        //Get Count
        $getCount = ProductsOrdersItems::find()
            ->where(['products_orders_id' => $this->id ])
            ->select('count(products_orders_id) as total')
            ->groupBy('products_orders_id')
            ->asArray()->one();
        //echo '<pre>';print_r($getCount);die;
        $this->totalCartItems = isset($getCount['total'])?$getCount['total']:0;
    }

    public function fields()
    {
        return [
            // field name is the same as the attribute name
            'totalCartItems' => 'daskdhalkdhkalsdhlaksdh'
        ];
    }


    /**
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(ProductsPayment::className(), ['id' => 'payment_id']);
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
     * Gets query for [[ProductsOrdersStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrdersStatus()
    {
        return $this->hasOne(ProductsOrdersStatus::className(), ['id' => 'order_status']);
    }

    /**
     * Gets query for [[ProductsOrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrdersItems()
    {
        return $this->hasMany(ProductsOrdersItems::className(), ['products_orders_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsOrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShippingAddress()
    {
        return $this->hasOne(ProductsOrdersShippingAddress::className(), ['products_order_id' => 'id']);
    }




}
