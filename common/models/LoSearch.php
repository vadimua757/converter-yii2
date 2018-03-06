<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lo;

/**
 * LoSearch represents the model behind the search form about `common\models\Lo`.
 */
class LoSearch extends Lo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'site_id', 'tech', 'gold', 'silver','name',], 'integer'],
            [['city_id'], 'safe'],
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
        $query = Lo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            'site_id' => $this->site_id,
            'city_id' => $this->city_id,
            'tech' => $this->tech,
            'gold' => $this->gold,
            'silver' => $this->silver,
        ]);

        return $dataProvider;
    }
}
