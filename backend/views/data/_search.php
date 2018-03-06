<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DataSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'lo') ?>

    <?php echo $form->field($model, 'lo_id') ?>

    <?php echo $form->field($model, 'city') ?>

    <?php echo $form->field($model, 'article') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'display') ?>

    <?php // echo $form->field($model, 'korpus') ?>

    <?php // echo $form->field($model, 'ksh') ?>

    <?php // echo $form->field($model, 'zu') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'komments') ?>

    <?php // echo $form->field($model, 'marketprice') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'minprice') ?>

    <?php // echo $form->field($model, 'idmodel') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'proba') ?>

    <?php // echo $form->field($model, 'vstweight') ?>

    <?php // echo $form->field($model, 'allweight') ?>

    <?php // echo $form->field($model, 'pureweight') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'ucenka') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'np_status') ?>

    <?php // echo $form->field($model, 'mvd') ?>

    <?php // echo $form->field($model, 'defect') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
