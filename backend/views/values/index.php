<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;


/* @var $model common\models\V2 */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Values');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="values-index">


    <p>
        <?php
        if(Yii::$app->user->can("administrator")){
        echo Html::a(Yii::t('backend', 'Create {modelClass}', [
            'modelClass' => 'Values',
        ]), ['create'], ['class' => 'btn btn-success']);

        }
        ?>
    </p>

    <?php
    $gridColumns = [
// the name column configuration
        ['class'=>'kartik\grid\SerialColumn'],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'name',
            'pageSummary'=>false,
            'editableOptions'=>[
                'header'=>'name',
                'inputType'=> \kartik\editable\Editable::INPUT_TEXT,
            ],
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'name',
        ],

        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'display',
            'pageSummary'=>false,
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'display',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'display',
        ],

        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'korpus',
            'pageSummary'=>false,
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'korpus',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'korpus',
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'price',
            'pageSummary'=>false,
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'price',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'price',
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'ksh',
            'pageSummary'=>false,
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'ksh',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'ksh',
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'idmodel',
            'pageSummary'=>false,
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'idmodel',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'idmodel',
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute' => 'active',
            'editableOptions' => [
                'inputType' => Editable::INPUT_CHECKBOX_X,
                'options' => [
                    'pluginOptions' => [
                        'threeState'=>false
                    ]
                ],
                'displayValueConfig' => [0 => Yii::t('yii','No'), 1 => Yii::t('yii','Yes')],
            ]

        ],
        [
            'class'=>'kartik\grid\BooleanColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'active',
        ],
        [
            'class' => '\kartik\grid\ActionColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'template' => '{delete}',
        ],
    ];

    // the GridView widget (you must use kartik\grid\GridView)
    echo \kartik\grid\GridView::widget([
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>$gridColumns,
        'floatHeader'=>false,
        'resizableColumns'=>true,
        'resizeStorageKey'=>Yii::$app->user->id,
    ]);
    //    echo GridView::widget([
    //    'dataProvider'=> $dataProvider,
    //    'filterModel' => $searchModel,
    //    'columns' => $gridColumns,
    //    'floatHeader'=>true,
    //    'pjax'=>true,
    //    'pjaxSettings'=>[
    //    'neverTimeout'=>true,
    //    ],
    //    'panel' => [
    //    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
    //    'type'=>'success',
    //    'before'=>Html::a(Yii::t('backend', 'Create {modelClass}', [
    //        'modelClass' => 'Lo',
    //    ]), ['create'], ['class' => 'btn btn-success']),
    //    'after'=>Html::a(Yii::t('backend','<i class="glyphicon glyphicon-repeat"></i> Reset Grid'), ['index'], ['class' => 'btn btn-info']),
    //    'footer'=>false
    //],
    //    ]);
    ?>

</div>
