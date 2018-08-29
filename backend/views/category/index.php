<?php
/**
 * Created by PhpStorm.
 * User: melnichuk.vs
 * Date: 15.08.2018
 * Time: 11:08
 */
use kartik\tree\TreeView;
use common\models\Category;
use kartik\tree\Module;

/* @var $this yii\web\View */

$this->title = Yii::t('backend', 'Categories');

echo TreeView::widget([
    'nodeView' => '@app/views/category/_form',
    'query' => Category::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Categories'],
    'fontAwesome' => true,     // optional
    'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => false,       // defaults to true
    'cacheSettings' => [
        'enableCache' => false   // defaults to true
    ],
    'showInactive' => true,
    'nodeAddlViews' => [
        Module::VIEW_PART_1 => '',
//        Module::VIEW_PART_2 => '@app/views/category/upload',
        Module::VIEW_PART_3 => '',
        Module::VIEW_PART_4 => '',
        Module::VIEW_PART_5 => '',
    ]
//    'nodeAddlViews' => [
//    Module::VIEW_PART_2 => '@app/views/category/upload_form',
//]Views' => [
//    Module::VIEW_PART_2 => '@app/views/category/upload_form',
//]
]);