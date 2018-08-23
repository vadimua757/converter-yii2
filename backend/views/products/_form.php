<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use skeeks\yii2\ckeditor\CKEditorWidget;
use skeeks\yii2\ckeditor\CKEditorPresets;
use kartik\widgets\SwitchInput;
use common\models\Manufacturers;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $manufacturers common\models\Manufacturers[]
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'quantity')->textInput(['numeric' => true]) ?>

    <?php echo $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php
    echo SwitchInput::widget([
        'name'=>'status',
        'value'=>true,
        'pluginOptions'=>[
            'handleWidth'=>70,
            'onText'=> Yii::t('backend', 'Active'),
            'offText'=> Yii::t('backend', 'Inactive')
        ]
    ]);
    ?>

    <?php echo $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditorWidget::className(), [
        'options' => ['rows' => 6],
        'preset' => CKEditorPresets::FULL
    ]) ?>

    <?php echo $form->field($model, 'category_id')->textInput() ?>

<!--    --><?php //echo $form->field($model, 'manufacturer_id')->textInput() ?>
    <?php
    echo Select2::widget([
        'model' => $model,
        'attribute' => 'manufacturer_id',
//        'data' => ArrayHelper::map(Manufacturers::find()->all(), 'id', 'title'),
        'data' => ArrayHelper::map(Manufacturers::find()->orderBy('title')->all(), 'title', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Select manufacturer')],

    ]);
    ?>

    <?php echo $form->field($model, 'thumbnail_base_url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'thumbnail_path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
