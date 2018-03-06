<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lo */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Lo',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Los'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="lo-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
