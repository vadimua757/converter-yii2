<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;

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
            'lo',
            'lo_id',
            'city',
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
             'amount',
             'proba:ntext',
             'vstweight:ntext',
             'allweight:ntext',
             'pureweight:ntext',
             'type',
             'ucenka',
             'active',
             'np_status',
             'mvd:ntext',
             'defect:ntext',

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
        'showPageSummary'=>true,
        'floatHeader'=>false,
        'pjax'=>true,
        'responsiveWrap'=>false,
//        'panel'=>[
//            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Library</h3>',
//            'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
//            'after' => false
//        ],
        'toolbar' =>  [
            ['content'=>
//                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
            ],
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