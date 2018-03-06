<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Data */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'lo')->textInput() ?>

    <?php echo $form->field($model, 'article')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'display')->textInput() ?>

    <?php echo $form->field($model, 'korpus')->textInput() ?>

    <?php echo $form->field($model, 'ksh')->textInput() ?>

    <?php echo $form->field($model, 'zu')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'brand')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'model')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'komments')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'marketprice')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'minprice')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'idmodel')->textInput() ?>

    <?php echo $form->field($model, 'ostatok')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
