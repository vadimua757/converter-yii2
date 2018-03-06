<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
