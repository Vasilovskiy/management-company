<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ManagmentCompany;

/**
 * ManagmentCompanySearch represents the model behind the search form about `common\models\ManagmentCompany`.
 */
class ManagmentCompanySearch extends ManagmentCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'address', 'domen', 'number', 'legal_name', 'legal_address', 'inn', 'kpp', 'ogrn', 'ras_schet', 'korr_schet', 'bik', 'inn_bank', 'kpp_bank', 'ogrn_bank'], 'safe'],
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
        $query = ManagmentCompany::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'domen', $this->domen])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'legal_name', $this->legal_name])
            ->andFilterWhere(['like', 'legal_address', $this->legal_address])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'ogrn', $this->ogrn])
            ->andFilterWhere(['like', 'ras_schet', $this->ras_schet])
            ->andFilterWhere(['like', 'korr_schet', $this->korr_schet])
            ->andFilterWhere(['like', 'bik', $this->bik])
            ->andFilterWhere(['like', 'inn_bank', $this->inn_bank])
            ->andFilterWhere(['like', 'kpp_bank', $this->kpp_bank])
            ->andFilterWhere(['like', 'ogrn_bank', $this->ogrn_bank]);

        return $dataProvider;
    }
}
