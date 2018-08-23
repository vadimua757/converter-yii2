<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dynagrid\DynaGrid;
use yii\helpers\ArrayHelper;
use common\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?php //echo Html::a(Yii::t('backend', 'Create {modelClass}', [
//    'modelClass' => 'Products',
//]), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?php //echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
////            'id',
//            'sku',
//            'quantity',
//            'price',
//            'status',
//            // 'model',
//            // 'slug',
//            // 'title',
//            // 'body:ntext',
//            // 'view',
//            // 'category_id',
//            // 'manufacturer_id',
//            // 'thumbnail_base_url:url',
//            // 'thumbnail_path',
//            // 'created_by',
//            // 'updated_by',
//            // 'created_at',
//            // 'updated_at',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
    $columns = [
//        ['class'=>'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT],
//            'id',
        [
            'attribute'=>'sku',
            'vAlign'=>'middle',
            'width'=>'auto',
//            'value'=>function ($model, $key, $index, $widget) {
//                return Html::a($model->author->name, '#', [
//                    'title'=>'View author detail',
//                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                ]);
//            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Products::find()->orderBy('sku')->asArray()->all(), 'sku', 'sku'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All'],
            'format'=>'raw'
        ],
        'quantity',
//            'city',
//        [
//            'attribute'=>'city',
//            'vAlign'=>'middle',
//            'width'=>'auto',
////            'value'=>function ($model, $key, $index, $widget) {
////                return Html::a($model->author->name, '#', [
////                    'title'=>'View author detail',
////                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////                ]);
////            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('city')->asArray()->all(), 'city', 'city'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All cities'],
//            'format'=>'raw'
//        ],
//        'article:ntext',
//        'name',
//        'display',
//        'korpus',
//        'ksh',
//        'zu:ntext',
//        'brand:ntext',
//        'model:ntext',
//        'komments:ntext',
//        'marketprice',
//        'price',
//        'minprice',
//        'idmodel',
////             'amount',
////             'proba:ntext',
//        [
//            'attribute'=>'proba',
//            'vAlign'=>'middle',
//            'width'=>'auto',
////            'value'=>function ($model, $key, $index, $widget) {
////                return Html::a($model->author->name, '#', [
////                    'title'=>'View author detail',
////                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////                ]);
////            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('proba')->asArray()->all(), 'proba', 'proba'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All '],
//            'format'=>'raw'
//        ],
//        'vstweight:ntext',
//        'allweight:ntext',
//        'pureweight:ntext',
////             'type',
//        [
//            'attribute'=>'type',
//            'vAlign'=>'middle',
//            'width'=>'auto',
////            'value'=>function ($model, $key, $index, $widget) {
////                return Html::a($model->author->name, '#', [
////                    'title'=>'View author detail',
////                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////                ]);
////            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('type')->asArray()->all(), 'type', 'type'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All '],
//            'format'=>'raw'
//        ],
////             'ucenka',
//        [
//            'attribute'=>'ucenka',
//            'vAlign'=>'middle',
//            'width'=>'auto',
////            'value'=>function ($model, $key, $index, $widget) {
////                return Html::a($model->author->name, '#', [
////                    'title'=>'View author detail',
////                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////                ]);
////            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('ucenka')->asArray()->all(), 'ucenka', 'ucenka'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All '],
//            'format'=>'raw'
//        ],
        [
//            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'vAlign' => 'middle',
            'width'=>'auto',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(Products::find()->orderBy('status')->asArray()->all(), 'status', 'status'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'All '],
            'format'=>'raw'

        ],
//        'action',
//        'np_status',
//        'mvd:ntext',
//        'defect:ntext',
////             'category',
//        [
//            'attribute'=>'category',
//            'vAlign'=>'middle',
//            'width'=>'auto',
////            'value'=>function ($model, $key, $index, $widget) {
////                return Html::a($model->author->name, '#', [
////                    'title'=>'View author detail',
////                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
////                ]);
////            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(Data::find()->orderBy('category')->asArray()->all(), 'category', 'category'),
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'All '],
//            'format'=>'raw'
//        ],
//        'barcode',

//            ['class' => 'yii\grid\ActionColumn'],
    ];

$dynagrid = DynaGrid::begin([
    'columns' => $columns,
    'theme'=>'panel-info',
//    'showPersonalize'=>true,
    'storage'=>DynaGrid::TYPE_COOKIE,
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'showPageSummary'=>false,
        'floatHeader'=>false,
        'pjax'=>true,
        'responsiveWrap'=>true,
        'toolbar' =>  [
            ['content'=>
                 Html::a(Yii::t('backend', 'Create {modelClass}', ['modelClass' => 'Products',]), ['create'], ['class' => 'btn btn-success'])
//                 Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
            ],
            ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'],
            '{export}',
        ]
    ],
    'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
]);
if (substr($dynagrid->theme, 0, 6) == 'simple') {
    $dynagrid->gridOptions['panel'] = true;
}
DynaGrid::end();

    ; ?>

</div>
