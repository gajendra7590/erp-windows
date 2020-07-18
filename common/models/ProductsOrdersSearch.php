<?php

namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductsOrders;

/**
 * ProductsOrdersSearch represents the model behind the search form of `common\models\ProductsOrders`.
 */
class ProductsOrdersSearch extends ProductsOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payment_id', 'user_id', 'cart_total', 'delhivery_charges', 'order_status','total_pay'], 'integer'],
            [['order_prod_uid'],'string'],
            [['coupen_code', 'booking_date', 'expected_delhivery_date', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductsOrders::find();
        //Custom Code Added
        $query->select('*,
           (cart_total + delhivery_charges) as total_pay');


        if( (!Yii::$app->user->isGuest) && (Yii::$app->user->identity->role == '3') ){
            $uid = Yii::$app->user->identity->id;
            //$uid = 3;
            $query->where("FIND_IN_SET($uid,order_prod_uid)");
        }

        $query->orderBy(['id'=>SORT_DESC]);

        $query->with(['user' => function ($query) {
            $query->select('id, first_name, last_name,profile_photo');
        }]);

        $query->with(['payment' => function ($query) {
            $query->select('id,payment_success_id,payment_receipt_url,payment_brand,
                    payment_exp_month,payment_exp_year,payment_last4,payment_status');
        }]);

        $query->with(['productsOrdersStatus' => function ($query) {
            $query->select('id,name,title');
        }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'payment_id' => $this->payment_id,
            'user_id' => $this->user_id,
            'cart_total' => $this->cart_total,
            'delhivery_charges' => $this->delhivery_charges,
            'booking_date' => $this->booking_date,
            'expected_delhivery_date' => $this->expected_delhivery_date,
            'order_status' => $this->order_status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'coupen_code', $this->coupen_code]);

         //echo '<pre>';print_r($query->all());die;

        return $dataProvider;
    }
}
