<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid\DynaGrid;
use yii\helpers\ArrayHelper;
use common\models\Data;
//use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">
    <p>
        <?php

        if(Yii::$app->user->can("administrator")) {
            echo Html::a(Yii::t('backend', 'Upload', [
                'modelClass' => 'Data',
            ]), ['upload'], ['class' => 'btn btn-success']) . ' ';
        echo Html::a(Yii::t('backend', 'Import', [
            'modelClass' => 'Data',
        ]), ['import'], ['class' => 'btn btn-success']) . ' ';

        echo Html::a(Yii::t('backend', 'Refactor', [
            'modelClass' => 'Data',
        ]), ['refactor'], ['class' => 'btn btn-success']) . ' ';

        echo Html::a(Yii::t('backend', 'Export', [
            'modelClass' => 'Data',
        ]), ['export'], ['class' => 'btn btn-success']) . ' ';

        echo Html::a(Yii::t('backend', 'Download file', [
            'modelClass' => 'Data',
        ]), ['download'], ['class' => 'btn btn-success']) . ' ';

        echo Html::a(Yii::t('backend', 'Download file for svodn.', [
            'modelClass' => 'Data',
        ]), ['svodnaja'], ['class' => 'btn btn-info']) . ' ';
        }
        ?>

        <?php echo Html::a(Yii::t('backend', 'Sold file', [
            'modelClass' => 'Dara',
        ]), ['sold'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php

    $columns = [
//        ['class'=>'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT],
//            'id',
        [
            'attribute'=>'lo',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('lo')->asArray()->all(), 'lo', 'lo'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All'],
            'format'=>'raw'
        ],
            'lo_id',
//            'city',
        [
            'attribute'=>'city',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('city')->asArray()->all(), 'city', 'city'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All cities'],
            'format'=>'raw'
        ],
            'article:ntext',
             'name',
             'display',
             'korpus',
             'ksh',
             'zu:ntext',
             'brand:ntext',
             'model:ntext',
             'komments:ntext',
             'marketprice',
             'price',
             'minprice',
             'idmodel',
//             'amount',
//             'proba:ntext',
        [
            'attribute'=>'proba',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('proba')->asArray()->all(), 'proba', 'proba'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All '],
            'format'=>'raw'
        ],
             'vstweight:ntext',
             'allweight:ntext',
             'pureweight:ntext',
//             'type',
        [
            'attribute'=>'type',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('type')->asArray()->all(), 'type', 'type'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All '],
            'format'=>'raw'
        ],
//             'ucenka',
        [
            'attribute'=>'ucenka',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('ucenka')->asArray()->all(), 'ucenka', 'ucenka'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All '],
            'format'=>'raw'
        ],
//        [
////            'class' => 'kartik\grid\BooleanColumn',
//            'attribute' => 'action',
//            'vAlign' => 'middle',
//            'width'=>'auto',
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('action')->asArray()->all(), 'action', 'action'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All '],
//            'format'=>'raw'
//
//        ],
             'action',
             'np_status',
             'mvd:ntext',
             'defect:ntext',
//             'category',
        [
            'attribute'=>'category',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Data::find()->orderBy('category')->asArray()->all(), 'category', 'category'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All '],
            'format'=>'raw'
        ],
             'barcode',

//            ['class' => 'yii\grid\ActionColumn'],
        ];

$dynagrid = DynaGrid::begin([
    'columns' => $columns,
    'theme'=>'panel-info',
    'showPersonalize'=>true,
    'storage'=>DynaGrid::TYPE_COOKIE,
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'showPageSummary'=>false,
        'floatHeader'=>false,
        'pjax'=>true,
        'responsiveWrap'=>true,
//        'panel'=>[
//            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Library</h3>',
//            'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
//            'after' => false
//        ],
        'toolbar' =>  [
//            ['content'=>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
//                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
//            ],
            ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'],
            '{export}',
        ]
    ],
    'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
]);
if (substr($dynagrid->theme, 0, 6) == 'simple') {
    $dynagrid->gridOptions['panel'] = false;
}
DynaGrid::end();

    //echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns'=>$columns,
//    ]); ?>

</div>