<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Valsilver */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Valsilver',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Valsilvers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valsilver-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
