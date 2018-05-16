<?php

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;
use common\models\Data;
use yii\helpers\ArrayHelper;



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

//        $tech1 = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Tech" GROUP BY lo')
//            ->queryAll();



//        echo $tech1;
//        die();

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


//        echo Highcharts::widget([
//            'options' => [
//                'scripts' => [
//                    'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
//                    'modules/exporting', // adds Exporting button/menu to chart
//                    'themes/grid',        // applies global 'grid' theme to all charts
//                    'modules/drilldown'
//                ],
//
//                'title' => ['text' => 'Types of products'],
//                'chart' => ['type' => 'column'],
//
//                'xAxis' => ['categories' => ["Type"]],
//                'yAxis' => ['title' => ['text' => 'Num']],
//                'series' => [
////                    ['name' => 'Tech', 'data' => (int)$tech],
//                            "name" => "Type",
//                            "colorByPoint" => true,
//                            "data" => [
//                                [
//                                    "name" => "Tech",
//                                    "y" => [(int)$tech],
//                                    "drilldown" => "Tech"
//                                ],
//                                [
//                                    "name" => "Gold",
//                                    "y" => [(int)$gold],
//                                    "drilldown" => "Gold"
//                                ],
//                                [
//                                    "name" => "Silver",
//                                    "y" => [(int)$silver],
//                                    "drilldown" => "Silver"
//                                ],
//                                [
//                                    "name" => "Diamond",
//                                    "y" => [(int)$diamond],
//                                    "drilldown" => "Diamond"
//                                ],
//                            ]
//                        ],
//
////                    ['name' => 'Tech', 'data' => [(int)$tech], "drilldown" => "Tech"],
////                    ['name' => 'Gold', 'data' => [(int)$gold]],
////                    ['name' => 'Diamond', 'data' => [(int)$diamond]],
////                    ['name' => 'Silver', 'data' => [(int)$silver]]
////                ],
//                "drilldown" => [
//                    "series" => [
//                        [
//                            "name" => "Tech",
//                            "id" => "Tech",
//                            "data" => [
//                                ["v11.0", 24.13],
//                                ["v8.0", 17.2],
//                                ["v9.0", 8.11],
//                                ["v10.0", 5.33],
//                                ["v6.0", 1.06],
//                                ["v7.0", 0.5]
//                            ]
//                        ],
//                    ]
//                ]
//            ]
//        ]);

        echo Highcharts::widget([
            'scripts' => [
                'highcharts-3d',
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
//                "drilldown" => [
//                    "series" => [
//                        [
//                            "name" => "Tech",
//                            "id" => "Tech",
//                            "data" => [
//                                ["v11.0", 24.13],
//                                ["v8.0", 17.2],
//                                ["v9.0", 8.11],
//                                ["v10.0", 5.33],
//                                ["v6.0", 1.06],
//                                ["v7.0", 0.5]
//                            ]
//                        ],
//                        [
//                            "name" => "Gold",
//                            "id" => "Gold",
//                            "data" => [
//                                ["v40.0", 5],
//                                ["v41.0", 4.32],
//                                ["v42.0", 3.68],
//                                ["v39.0", 2.96],
//                                ["v36.0", 2.53],
//                                ["v43.0", 1.45],
//                                ["v31.0", 1.24],
//                                ["v35.0", 0.85],
//                                ["v38.0", 0.6],
//                                ["v32.0", 0.55],
//                                ["v37.0", 0.38],
//                                ["v33.0", 0.19],
//                                ["v34.0", 0.14],
//                                ["v30.0", 0.14]
//                            ]
//                        ],
//                        [
//                            "name" => "Silver",
//                            "id" => "Silver",
//                            "data" => [
//                                ["v35", 2.76],
//                                ["v36", 2.32],
//                                ["v37", 2.31],
//                                ["v34", 1.27],
//                                ["v38", 1.02],
//                                ["v31", 0.33],
//                                ["v33", 0.22],
//                                ["v32", 0.15]
//                            ]
//                        ],
//                        [
//                            "name" => "Diamond",
//                            "id" => "Diamond",
//                            "data" => [
//                                ["v8.0", 2.56],
//                                ["v7.1", 0.77],
//                                ["v5.1", 0.42],
//                                ["v5.0", 0.3],
//                                ["v6.1", 0.29],
//                                ["v7.0", 0.26],
//                                ["v6.2", 0.17]
//                            ]
//                        ],
//                    ]
//                ]
            ]]);
        ?>
    </p>

</div>