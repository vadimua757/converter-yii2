<?php

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;
use common\models\Data;
use yii\helpers\ArrayHelper;
use common\models\Lo;
use miloschuman\highcharts\SeriesDataHelper;



/* @var $this yii\web\View */
/* @var $searchModel common\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('backend', 'Stats');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
    <p>
        <?php

        echo Highcharts::widget([
            'scripts' => [
//                'highcharts-3d',
                'modules/drilldown',
                'modules/exporting',
                'themes/sand-signika',
            ],
            'options' => [

                'title' => ['text' => 'Types of products'],
                'chart' => [
                        'type' => 'column'
                ],

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
                            "data" =>  new SeriesDataHelper ($techVal,[0, '1:int'])
                        ],
                        [
                            "name" => "Gold",
                            "id" => "Gold",
                            "data" => new SeriesDataHelper ($goldVal,[0, '1:int'])
                        ],
                        [
                            "name" => "Silver",
                            "id" => "Silver",
                            "data" => new SeriesDataHelper ($silverVal,[0, '1:int'])
                        ],
                        [
                            "name" => "Diamond",
                            "id" => "Diamond",
                            "data" => new SeriesDataHelper ($diamondVal,[0, '1:int'])
                        ],
                    ]
                ]
            ]]);
        ?>
    </p>

</div>