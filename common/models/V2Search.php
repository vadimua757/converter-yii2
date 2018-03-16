<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\V2;

/**
 * V2Search represents the model behind the search form about `common\models\V2`.
 */
class V2Search extends V2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idmodel', 'active', 'id_defect'], 'integer'],
            [['name', 'display', 'korpus', 'price', 'ksh'], 'safe'],
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
        $query = V2::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idmodel' => $this->idmodel,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'display', $this->display])
            ->andFilterWhere(['like', 'korpus', $this->korpus])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'ksh', $this->ksh]);

        return $dataProvider;
    }
}
