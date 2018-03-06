<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Valgold */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Valgold',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Valgolds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valgold-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
