<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\grid\CheckboxColumn;
use kartik\grid\GridView;
use yii\helpers\json;
use common\models\Cities;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\editable\Editable;

/* @var $model common\models\Lo */
/* @var $cities common\models\Lo[] */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Los');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lo-index">


    <p>
    <?php
    if(Yii::$app->user->can("administrator")){
        echo Html::a(Yii::t('backend', 'Create {modelClass}', [
            'modelClass' => 'Lo',
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
        'attribute'=>'site_id',
        'editableOptions'=> function ($model, $key, $index) {
            return [
                'header'=>'site_id',
                'size'=>'md',
            ];
        }
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'visible' => (!\Yii::$app->user->can("administrator")),
        'attribute'=>'site_id',
    ],
    [
        'class'=>'kartik\grid\EditableColumn',
        'visible' => (Yii::$app->user->can("administrator")),
        'attribute'=>'city_id',
        'editableOptions'=>[
            'header'=>'city_id',
            'inputType'=>Editable::INPUT_SELECT2,
            'options' => [
                'attribute'=>'city_id',
                'data' => ArrayHelper::map(Cities::find()->all(), 'name', 'name'),
                'options' => [
                    'multiple' => false,
                ],
                'pluginOptions' => [
                    'tags' => false,
                ],
            ],
        ],
//        'editableOptions'=> Editable::INPUT_DROPDOWN_LIST,
//        'data' => ArrayHelper::map(Cities::find()->all(), 'name', 'name'),
//        'options' => ['placeholder' => 'Select a state ...'],
    ],
    [
        'class'=>'kartik\grid\DataColumn',
        'visible' => (!\Yii::$app->user->can("administrator")),
        'attribute'=>'city_id',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'visible' => (Yii::$app->user->can("administrator")),
        'attribute' => 'tech',
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
        'class' => 'kartik\grid\BooleanColumn',
        'visible' => (!\Yii::$app->user->can("administrator")),
        'attribute' => 'tech',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'visible' => (Yii::$app->user->can("administrator")),
        'attribute' => 'gold',
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
        'class' => 'kartik\grid\BooleanColumn',
        'visible' => (!\Yii::$app->user->can("administrator")),
        'attribute' => 'gold',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'visible' => (Yii::$app->user->can("administrator")),
        'attribute' => 'silver',
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
        'class' => 'kartik\grid\BooleanColumn',
        'visible' => (!\Yii::$app->user->can("administrator")),
        'attribute' => 'silver',

    ],
    [
        'class' => '\kartik\grid\ActionColumn',
        'visible' => (Yii::$app->user->can("administrator")),
        'template' => '{delete}'
    ],
];

// the GridView widget (you must use kartik\grid\GridView)
echo \kartik\grid\GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns'=>$gridColumns,
    'floatHeader'=>false,
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
