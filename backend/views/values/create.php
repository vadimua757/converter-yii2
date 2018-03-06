<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Values */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Values',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="values-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
