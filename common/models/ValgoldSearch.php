<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Valgold;

/**
 * ValgoldSearch represents the model behind the search form about `common\models\Valgold`.
 */
class ValgoldSearch extends Valgold
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ksh', 'idmodel'], 'integer'],
            [['kategory'], 'safe'],
            [['from', 'to'], 'number'],
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
        $query = Valgold::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'ksh' => $this->ksh,
            'idmodel' => $this->idmodel,
        ]);

        $query->andFilterWhere(['like', 'kategory', $this->kategory]);

        return $dataProvider;
    }
}
