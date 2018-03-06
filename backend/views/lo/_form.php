<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Cities;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;



/* @var $this yii\web\View */
/* @var $model common\models\Lo */
/* @var $cities common\models\Lo[] */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $cities array */

?>

<div class="lo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput() ?>
    <?php echo $form->field($model, 'site_id')->textInput() ?>
<!--    --><?php //echo $form->field($cities, 'sity_id')->dropDownList(ArrayHelper::map($cities, 'id', 'title'), ['prompt' => 'Root']) ?>
    <?php
    echo Select2::widget([
        'model' => $model,
        'attribute' => 'city_id',
        'data' => ArrayHelper::map(Cities::find()->all(), 'name', 'name'),
        'options' => ['placeholder' => 'Select a state ...'],

    ]);
    ?>
    <?php echo $form->field($model, 'tech')->checkbox() ?>
    <?php echo $form->field($model, 'gold')->checkbox() ?>
    <?php echo $form->field($model, 'silver')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
