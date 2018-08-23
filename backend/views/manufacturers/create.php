<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Manufacturers */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Manufacturers',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Manufacturers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
