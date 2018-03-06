<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ValsilverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Valsilvers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valsilver-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(Yii::$app->user->can("administrator")){
            echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                'modelClass' => 'Valsilver',
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
            'attribute'=>'kategory',
            'editableOptions'=>[
                'header'=>'kategory',
                'inputType'=> \kartik\editable\Editable::INPUT_TEXT,
            ],
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'kategory',
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'from',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'from',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'from',
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute'=>'to',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'to',
                    'size'=>'md',
                ];
            }
        ],
        [
            'class'=>'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute'=>'to',
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute' => 'ksh',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'ksh',
                    'size'=>'md',
                ];
            }

        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'visible' => (!\Yii::$app->user->can("administrator")),
            'attribute' => 'ksh',
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'visible' => (Yii::$app->user->can("administrator")),
            'attribute' => 'idmodel',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'idmodel',
                    'size'=>'md',
                ];
            }

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
    ?>

</div>
