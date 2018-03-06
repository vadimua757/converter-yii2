<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ValsilverSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="valsilver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'kategory') ?>

    <?php echo $form->field($model, 'from') ?>

    <?php echo $form->field($model, 'to') ?>

    <?php echo $form->field($model, 'ksh') ?>

    <?php // echo $form->field($model, 'idmodel') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
