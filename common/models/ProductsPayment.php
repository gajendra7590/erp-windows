<?php

namespace common\models;

use common\models\User;

use Yii;

/**
 * This is the model class for table "products_payment".
 *
 * @property int $id
 * @property string $payment_success_id
 * @property int $user_id
 * @property string|null $payment_name
 * @property string|null $payment_email
 * @property string|null $payment_phone
 * @property string|null $payment_description
 * @property string|null $payment_amount
 * @property string|null $payment_created
 * @property string|null $payment_currency
 * @property string|null $payment_receipt_email
 * @property string|null $payment_receipt_url
 * @property string|null $payment_brand
 * @property string|null $payment_exp_month
 * @property string|null $payment_exp_year
 * @property string|null $payment_last4
 * @property string|null $payment_country
 * @property string|null $payment_network
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_country
 * @property string|null $billing_postal_code
 * @property string|null $billing_line1
 * @property string|null $billing_line2
 * @property string $payment_status 0=>failure,1=>success
 * @property string|null $created_at
 *
 * @property ProductsOrders[] $productsOrders
 * @property ProductsOrders[] $productsOrders0
 * @property User $user
 */
class ProductsPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_success_id', 'user_id', 'payment_status'], 'required'],
            [['user_id'], 'integer'],
            [['payment_status'], 'string'],
            [['created_at'], 'safe'],
            [['payment_success_id'], 'string', 'max' => 100],
            [['payment_name', 'payment_email', 'payment_phone', 'payment_description', 'payment_amount', 'payment_created', 'payment_currency', 'payment_receipt_email', 'payment_receipt_url', 'payment_brand', 'payment_exp_month', 'payment_exp_year', 'payment_last4', 'payment_country', 'payment_network', 'billing_city', 'billing_state', 'billing_country', 'billing_postal_code', 'billing_line1', 'billing_line2'], 'string', 'max' => 256],
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
            'payment_success_id' => 'Payment Success ID',
            'user_id' => 'User ID',
            'payment_name' => 'Payment Name',
            'payment_email' => 'Payment Email',
            'payment_phone' => 'Payment Phone',
            'payment_description' => 'Payment Description',
            'payment_amount' => 'Payment Amount',
            'payment_created' => 'Payment Created',
            'payment_currency' => 'Payment Currency',
            'payment_receipt_email' => 'Payment Receipt Email',
            'payment_receipt_url' => 'Payment Receipt Url',
            'payment_brand' => 'Payment Brand',
            'payment_exp_month' => 'Payment Exp Month',
            'payment_exp_year' => 'Payment Exp Year',
            'payment_last4' => 'Payment Last4',
            'payment_country' => 'Payment Country',
            'payment_network' => 'Payment Network',
            'billing_city' => 'Billing City',
            'billing_state' => 'Billing State',
            'billing_country' => 'Billing Country',
            'billing_postal_code' => 'Billing Postal Code',
            'billing_line1' => 'Billing Line1',
            'billing_line2' => 'Billing Line2',
            'payment_status' => 'Payment Status',
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

    /**
     * Gets query for [[ProductsOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders()
    {
        return $this->hasMany(ProductsOrders::className(), ['payment_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsOrders0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders0()
    {
        return $this->hasMany(ProductsOrders::className(), ['payment_id' => 'id']);
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
