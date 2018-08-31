<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use skeeks\yii2\ckeditor\CKEditorWidget;
use skeeks\yii2\ckeditor\CKEditorPresets;
use kartik\widgets\SwitchInput;
use common\models\Manufacturers;
use common\models\Category;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use trntv\filekit\widget\Upload;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;


/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $manufacturers common\models\Manufacturers[]
/* @var $categories common\models\Category[]
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-3">
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
        </div>
        <div class="col-sm-2">
    <?php echo $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
    <?php echo $form->field($model, 'quantity')->textInput(['numeric' => true]) ?>
        </div>
        <div class="col-sm-3">
    <?php echo $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4">
    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
    <?php echo $form->field($model, 'slug')
//        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
    <?php
    echo Select2::widget([
        'model' => $model,
        'attribute' => 'category_id',
//        'data' => ArrayHelper::map(Manufacturers::find()->all(), 'id', 'title'),
        'data' => ArrayHelper::map(Category::find()->orderBy('name')->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('backend', 'Select category')],

    ]);
    ?>
        </div>
        <div class="col-md-2">
        <?php
        echo Select2::widget([
            'model' => $model,
            'attribute' => 'manufacturer_id',
//        'data' => ArrayHelper::map(Manufacturers::find()->all(), 'id', 'title'),
            'data' => ArrayHelper::map(Manufacturers::find()->orderBy('title')->all(), 'id', 'title'),
            'options' => ['placeholder' => Yii::t('backend', 'Select manufacturer')],

        ]);
        ?>
    </p>
    </div>
    </div>
    <?= $form->field($model, 'body')->widget(CKEditorWidget::className(), [
        'preset' => CKEditorPresets::EXTRA,
        'clientOptions' =>
		[
            'height' => 200,
            ]
    ]) ?>

<!--    --><?php //echo $form->field($model, 'thumbnail_base_url')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //echo $form->field($model, 'thumbnail_path')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
