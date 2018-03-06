<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use common\models\Config;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Config *
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('backend', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'url')->textarea(['rows' => 1]) ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end() ?>

</div>
