<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Data;

/**
 * DataSearch represents the model behind the search form about `common\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lo', 'lo_id', 'display', 'korpus', 'ksh', 'idmodel', 'amount', 'active'], 'integer'],
            [['city', 'article', 'name', 'zu', 'brand', 'model', 'komments', 'proba', 'vstweight', 'allweight', 'pureweight', 'type', 'ucenka', 'np_status', 'mvd', 'defect', 'category', 'barcode', 'action'], 'safe'],
            [['marketprice', 'price', 'minprice'], 'number'],
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
        $query = Data::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'lo' => $this->lo,
            'lo_id' => $this->lo_id,
            'display' => $this->display,
            'korpus' => $this->korpus,
            'ksh' => $this->ksh,
            'marketprice' => $this->marketprice,
            'price' => $this->price,
            'minprice' => $this->minprice,
            'idmodel' => $this->idmodel,
            'amount' => $this->amount,
            'active' => $this->active,
            'action' => $this->action,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'article', $this->article])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'zu', $this->zu])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'komments', $this->komments])
            ->andFilterWhere(['like', 'proba', $this->proba])
            ->andFilterWhere(['like', 'vstweight', $this->vstweight])
            ->andFilterWhere(['like', 'allweight', $this->allweight])
            ->andFilterWhere(['like', 'pureweight', $this->pureweight])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'ucenka', $this->ucenka])
            ->andFilterWhere(['like', 'np_status', $this->np_status])
            ->andFilterWhere(['like', 'mvd', $this->mvd])
            ->andFilterWhere(['like', 'defect', $this->defect])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'barcode', $this->barcode]);

        return $dataProvider;
    }
}
