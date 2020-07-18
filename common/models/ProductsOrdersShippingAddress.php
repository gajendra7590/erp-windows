<?php

namespace common\models;

use Yii;
use common\models\ProductsOrders;

/**
 * This is the model class for table "products_orders_shipping_address".
 *
 * @property int $id
 * @property int $products_order_id
 * @property int $same_as_billing_address
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone2
 * @property string|null $country
 * @property string|null $state
 * @property string|null $city
 * @property string|null $zipcode
 * @property string|null $address_line_one
 * @property string|null $address_line_two
 * @property string|null $order_note
 * @property int $address_type 1 => home,2 => office
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ProductsOrders $productsOrder
 */
class ProductsOrdersShippingAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders_shipping_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'products_order_id'], 'required'],
            [['id', 'products_order_id', 'same_as_billing_address', 'address_type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'company_name', 'email', 'country', 'state', 'city'], 'string', 'max' => 50],
            [['phone', 'phone2'], 'string', 'max' => 20],
            [['zipcode'], 'string', 'max' => 10],
            [['address_line_one', 'address_line_two', 'order_note'], 'string', 'max' => 256],
            [['products_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsOrders::className(), 'targetAttribute' => ['products_order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'products_order_id' => 'Products Order ID',
            'same_as_billing_address' => 'Same As Billing Address',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'company_name' => 'Company Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'phone2' => 'Phone2',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'address_line_one' => 'Address Line One',
            'address_line_two' => 'Address Line Two',
            'order_note' => 'Order Note',
            'address_type' => 'Address Type',
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
     * Gets query for [[ProductsOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrder()
    {
        return $this->hasOne(ProductsOrders::className(), ['id' => 'products_order_id']);
    }
}
