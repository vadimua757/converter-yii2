<?php

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use miloschuman\highcharts\HighchartsAsset;
use common\models\Data;
use yii\helpers\ArrayHelper;
use common\models\Lo;



/* @var $this yii\web\View */
/* @var $searchModel common\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
///* @var $tmp */

$this->title = Yii::t('backend', 'Stats');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
    <p>
        <?php

//        $arr =
        $tech = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'tech'])
            ->count();

    print_r($tmp);
        die();

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
            'scripts' => [
//                'highcharts-3d',
                'modules/drilldown',
                'modules/exporting',
                'themes/sand-signika',
            ],
            'options' => [

                'title' => ['text' => 'Types of products'],
                'chart' => ['type' => 'column'],

                'xAxis' => ['type' => 'category'],
                'yAxis' => ['title' => ['text' => 'Num']],
                "plotOptions" => [
                    "series" => [
                        "dataLabels" => [
                            "enabled" => true,
                            "format" => "{point.y}"
                        ]
                    ]
                ],
                "series" => [
                    [
                        "name" => "Tech",
//                        "category" => "Tech",
//                        "colorByPoint" => true,
                        "data" => [
                            [
                                "name" => "Tech",
                                "y" => (int)$tech,
                                "drilldown" => "Tech"
                            ]
                        ],
                    ],
                    [
                        "name" => "Gold",
//                        "colorByPoint" => true,
                        "data" => [
                            [
                                "name" => "Gold",
                                "y" => (int)$gold,
                                "drilldown" => "Gold"
                            ]
                        ],
                    ],
                    [
                        "name" => "Silver",
//                        "colorByPoint" => true,
                        "data" => [
                            [
                                "name" => "Silver",
                                "y" => (int)$silver,
                                "drilldown" => "Silver"
                            ]
                        ],
                    ],
                    [
                        "name" => "Diamond",
//                        "colorByPoint" => true,
                        "data" => [
                            [
                                "name" => "Diamond",
                                "y" => (int)$diamond,
                                "drilldown" => "Diamond"
                            ]
                        ],
                    ],
                ],
                "drilldown" => [
                    "series" => [
                        [
                            "name" => "Tech",
                            "id" => "Tech",
                            "data" => [
                                $tmp
                            ]
                        ],
                        [
                            "name" => "Gold",
                            "id" => "Gold",
                            "data" => [
                                ["v40.0", 5],
                                ["v41.0", 4.32],
                                ["v42.0", 3.68],
                                ["v39.0", 2.96],
                                ["v36.0", 2.53],
                                ["v43.0", 1.45],
                                ["v31.0", 1.24],
                                ["v35.0", 0.85],
                                ["v38.0", 0.6],
                                ["v32.0", 0.55],
                                ["v37.0", 0.38],
                                ["v33.0", 0.19],
                                ["v34.0", 0.14],
                                ["v30.0", 0.14]
                            ]
                        ],
                        [
                            "name" => "Silver",
                            "id" => "Silver",
                            "data" => [
                                ["v35", 2.76],
                                ["v36", 2.32],
                                ["v37", 2.31],
                                ["v34", 1.27],
                                ["v38", 1.02],
                                ["v31", 0.33],
                                ["v33", 0.22],
                                ["v32", 0.15]
                            ]
                        ],
                        [
                            "name" => "Diamond",
                            "id" => "Diamond",
                            "data" => [
                                ["v8.0", 2.56],
                                ["v7.1", 0.77],
                                ["v5.1", 0.42],
                                ["v5.0", 0.3],
                                ["v6.1", 0.29],
                                ["v7.0", 0.26],
                                ["v6.2", 0.17]
                            ]
                        ],
                    ]
                ]
            ]]);
        ?>
    </p>

</div>