<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use common\models\Data;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\multiparser\widgets\ParserView;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Data */
/* @var $mode common\models\Config */
/* @var $form yii\bootstrap\ActiveForm */


$this->title = Yii::t('backend', 'Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-upload">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <p>
        <?php
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => [],
        ]);
        ?>
    </p>
<!---->
<!--    --><?//= $form->field($model, 'file')->fileInput() ?>
<!--    <button>Submit</button>-->

    <?php ActiveForm::end() ?>

</div>
