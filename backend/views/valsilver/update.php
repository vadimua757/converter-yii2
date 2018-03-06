<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Valsilver */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Valsilver',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Valsilvers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="valsilver-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
