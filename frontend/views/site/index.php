<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?php echo \common\widgets\DbCarousel::widget([
        'key'=>'index',
        'options' => [
            'class' => 'slide', // enables slide effect
        ],
    ]) ?>

    <div class="jumbotron">

<!--        --><?php //echo common\widgets\DbMenu::widget([
//            'key'=>'frontend-index',
//            'options'=>[
//                'tag'=>'p'
//            ]
//        ]) ?>

    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
