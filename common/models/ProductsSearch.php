<?php

namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `common\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sku_code','product_regular_price', 'product_sale_price', 'product_type', 'is_featured', 'status', 'user_id'], 'integer'],
            [['product_categories', 'title', 'slug', 'short_desc', 'description', 'featured_image'],'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        $query->where('status!=2');

        if (!Yii::$app->user->isGuest){
            if(Yii::$app->user->identity->role == '3'){
                $user_id = Yii::$app->user->identity->id;
                $query->where('user_id = '.$user_id);
            }
        }
        //Call Mapping Data
        $query->with(['variablesPrice' => function ($model) {
            $model->select('product_id,
                MIN(sale_price) as MinSP,
                MAX(sale_price) as MaxSP,
                MIN(regular_price) as MinRP, 
                MAX(regular_price) as MaxRP'
            )->groupBy('product_id');
        }]);

        $query->with(['user' => function ($query) {
            $query->select('id, first_name, last_name');
        }]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_regular_price' => $this->product_regular_price,
            'product_sale_price' => $this->product_sale_price,
            'product_type' => $this->product_type,
            'is_featured' => $this->is_featured,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'product_categories', $this->product_categories])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'short_desc', $this->short_desc])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image]);

        return $dataProvider;
    }
}
