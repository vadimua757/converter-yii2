<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use skeeks\yii2\ckeditor\CKEditorWidget;
use skeeks\yii2\ckeditor\CKEditorPresets;
use kartik\widgets\SwitchInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="manufacturers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions'=>[
            'handleWidth'=>70,
            'onText'=> Yii::t('backend', 'Active'),
            'offText'=> Yii::t('backend', 'Inactive')
        ]
    ]);
    ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditorWidget::className(), [
        'options' => ['rows' => 6],
        'preset' => CKEditorPresets::FULL
    ]) ?>

<!--    --><?php //echo $form->field($model, 'thumbnail_path')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::classname(), [
        'url'=>['picture-upload']
    ]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
