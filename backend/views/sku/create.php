<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sku */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Sku',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Skus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sku-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
