<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'lo',
//            'lo_id',
            'city',
            'article:ntext',
             'name',
            // 'display',
            // 'korpus',
             'ksh',
            // 'zu:ntext',
            // 'brand:ntext',
            // 'model:ntext',
            // 'komments:ntext',
            // 'marketprice',
             'price',
             'minprice',
            // 'idmodel',
            // 'amount',
             'proba:ntext',
             'vstweight:ntext',
             'allweight:ntext',
             'pureweight:ntext',
             'type',
             'ucenka',
            // 'active',
            // 'np_status',
            // 'mvd:ntext',
             'defect:ntext',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>