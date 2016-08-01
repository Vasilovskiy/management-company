<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\House;

/**
 * HouseSearch represents the model behind the search form about `common\models\House`.
 */
class HouseSearch extends House
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'attachment_id', 'managment_company_id', 'address_id', 'floors', 'apartaments', 'year_of_build', 'year_of_commissioning', 'created_at', 'updated_at'], 'integer'],
            [['state', 'series', 'type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = House::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'user_id' => $this->user_id,
            'attachment_id' => $this->attachment_id,
            'managment_company_id' => $this->managment_company_id,
            'address_id' => $this->address_id,
            'floors' => $this->floors,
            'apartaments' => $this->apartaments,
            'year_of_build' => $this->year_of_build,
            'year_of_commissioning' => $this->year_of_commissioning,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'series', $this->series])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
