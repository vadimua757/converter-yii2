<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cities */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cities',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
