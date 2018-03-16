<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lo */
/* @var $cities common\models\Cities */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Lo',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Los'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lo-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'cities' => $cities,
    ]) ?>

</div>
