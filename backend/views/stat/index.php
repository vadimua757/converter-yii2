<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use common\models\Data;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('backend', 'Stats');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
    <p>
        <?php

        $tech = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'tech'])
            ->count();

        $silver = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'silver'])
            ->count();
        $gold = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'gold'])
            ->count();
        $diamond = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'diamond'])
            ->count();

//        echo $tech;
        echo Highcharts::widget([
            'options' => [

                'title' => ['text' => 'Types of products'],
                'chart' => ['type' => 'column'],

                'xAxis' => ['categories' => ["Type"]],
                'yAxis' => ['title' => ['text' => 'Num']],
                'series' => [
//                    ['name' => 'Tech', 'data' => (int)$tech],
                    ['name' => 'Tech', 'data' => [(int)$tech]],
                    ['name' => 'Gold', 'data' => [(int)$gold]],
                    ['name' => 'Diamond', 'data' => [(int)$diamond]],
                    ['name' => 'Silver', 'data' => [(int)$silver]]
                ]
            ]
        ]);

        ?>
    </p>

</div>