<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductsCategories;

/**
 * ProductsCategoriesSearch represents the model behind the search form of `common\models\ProductsCategories`.
 */
class ProductsCategoriesSearch extends ProductsCategories
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','featured'], 'integer'],
            [['category_name', 'category_slug', 'category_desc', 'created_at', 'updated_at'], 'safe'],
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
        $query = ProductsCategories::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->where('status!=2');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'category_slug', $this->category_slug])
            ->andFilterWhere(['like', 'category_desc', $this->category_desc]);

        return $dataProvider;
    }
}
