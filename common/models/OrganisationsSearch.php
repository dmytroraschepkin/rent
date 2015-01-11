<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Organisations;

/**
 * OrganisationsSearch represents the model behind the search form about `common\models\Organisations`.
 */
class OrganisationsSearch extends Organisations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'budget_org', 'general_org', 'vat_payer', 'self_org', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'okpo', 'legal_address', 'real_address'], 'safe'],
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
        $query = Organisations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'budget_org' => $this->budget_org,
            'general_org' => $this->general_org,
            'vat_payer' => $this->vat_payer,
            'self_org' => $this->self_org,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'okpo', $this->okpo])
            ->andFilterWhere(['like', 'legal_address', $this->legal_address])
            ->andFilterWhere(['like', 'real_address', $this->real_address]);

        return $dataProvider;
    }
}
