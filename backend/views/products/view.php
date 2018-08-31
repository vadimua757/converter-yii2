<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
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
/* @var $categories common\models\Category */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

<!--    <p>-->
<!--        --><?php //echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?php
    $attributes=[
        [
            'group'=>true,
            'label'=>'SECTION 1: Identification Information',
            'rowOptions'=>['class'=>'info']
        ],
        [
            'columns' => [
                'title',
                'slug',
                [
                    'attribute'=>'sku',
                    'format'=>'raw',
                    'value'=>$model->sku,
                    'valueColOptions'=>['style'=>'width:10%'],
                    'displayOnly'=>false
                ],
                [
                    'attribute'=>'quantity',
                    'label'=>'q-ty',
                    'valueColOptions'=>['style'=>'width:5%'],
                ],
                [
                    'attribute'=>'price',
                    'label'=>'price',
                    'valueColOptions'=>['style'=>'width:10%'],
                ],
                [
                    'attribute'=>'status',
                    'label'=>'Active?',
                    'format'=>'raw',
                    'value'=>$model->status ?
                        '<span class="label label-success">Yes</span>' :
                        '<span class="label label-danger">No</span>',
                    'type'=>DetailView::INPUT_SWITCH,
                    'widgetOptions'=>[
                        'pluginOptions'=>[
                            'onText'=>'Yes',
                            'offText'=>'No',
                        ]
                    ]
                ],
            ],
        ],
        [
            'columns' => [
                    [
                    'attribute'=>'category_id',
                    'label'=>'Category',
                    'value'=>$model->getCategoryName(),
                        'type'=>DetailView::INPUT_SELECT2,
                        'widgetOptions'=>[
                            'data'=>ArrayHelper::map(Category::find()->orderBy('lft')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                        ],
                ],
                [
                    'attribute'=>'manufacturer_id',
                    'label'=>'Manufacturer',
                    'value'=>$model->getManufacturerName(),
                    'type'=>DetailView::INPUT_SELECT2,
                    'widgetOptions'=>[
                        'data'=>ArrayHelper::map(Manufacturers::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                        'options' => ['placeholder' => 'Select ...'],
                        'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                    ],
                ],
            ],
        ],
        [
            'group'=>true,
            'label'=>'SECTION 2: Description',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
        [
            'attribute'=>'body',
            'label'=>'',
//            'labelColOptions' => ['hidden' => true],
            'value'=>$model->body,
            'format'=>'HTML',
            'type'=>DetailView::INPUT_WIDGET,
            'widgetOptions'=>[
                'class'=>CKEditorWidget::classname(),
                'preset' => CKEditorPresets::EXTRA,
            ]
        ],
        [
            'group'=>true,
            'label'=>'SECTION 3: Photos',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
//        'columns' => [
            [
                'attribute'=>'thumbnail',
                'label'=>'thumbnail',
    //            'labelColOptions' => ['hidden' => true],
                'value' => $model->getThumbnail(),
                'format'=>'raw',
                'type'=>DetailView::INPUT_WIDGET,
                'widgetOptions'=>[
                    'class'=> Upload::classname(),
                    'url' => ['/file-storage/upload'],
                    'maxFileSize' => 5000000, // 5 MiB
                ],
            ],
            [
                'attribute'=>'attachments',
                'label'=>'attachments',
    //            'labelColOptions' => ['hidden' => true],
                'value'=> $model->getAttachments(),
//                'value'=> $model->getAttachments(),
                'format'=>'raw',
                'type'=>DetailView::INPUT_WIDGET,
                'widgetOptions'=>[
                    'class'=> Upload::classname(),
                    'url' => ['/file-storage/upload'],
                    'sortable' => true,
                    'maxFileSize' => 10000000, // 10 MiB
                    'maxNumberOfFiles' => 10
                ],
            ],
//        ],

    ];

    echo DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Product ID ' . $model->id . ' Name: ' . $model->title,
            'type'=>DetailView::TYPE_INFO,
        ],
        'labelColOptions'=>[
            'style' => 'width: 5%',
        ],
        'attributes'=>$attributes]);

//    echo DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'sku',
//            'quantity',
//            'price',
//            'status',
//            'model',
//            'slug',
//            'title',
//            'body:ntext',
//            'view',
//            'category_id',
//            'manufacturer_id',
//            'thumbnail_base_url:url',
//            'thumbnail_path',
//            'created_by',
//            'updated_by',
//            'created_at',
//            'updated_at',
//        ],
//    ])
    ?>

</div>
