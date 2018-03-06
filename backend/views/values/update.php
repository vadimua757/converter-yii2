<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Values */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Values',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="values-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
