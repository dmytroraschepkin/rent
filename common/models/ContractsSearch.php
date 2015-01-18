<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contracts;

/**
 * ContractsSearch represents the model behind the search form about `common\models\Contracts`.
 */
class ContractsSearch extends Contracts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'object_id', 'organisation_id', 'status', 'contract_type', 'object_part_id', 'created_at', 'updated_at'], 'integer'],
            [['number', 'date', 'start_date', 'end_date', 'descriptions', 'account_number', 'object_part_additional'], 'safe'],
            [['square', 'initial_price'], 'number'],
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
        $query = Contracts::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'object_id' => $this->object_id,
            'organisation_id' => $this->organisation_id,
            'status' => $this->status,
            'contract_type' => $this->contract_type,
            'square' => $this->square,
            'initial_price' => $this->initial_price,
            'object_part_id' => $this->object_part_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'object_part_additional', $this->object_part_additional]);

        return $dataProvider;
    }
}
