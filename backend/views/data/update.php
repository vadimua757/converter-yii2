<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Data */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Data',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="data-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
