<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Data */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Data',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
