<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Manufacturers',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Manufacturers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="manufacturers-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
