<?php
/**
 * Created by PhpStorm.
 * User: melnichuk.vs
 * Date: 15.08.2018
 * Time: 11:07
 */

namespace backend\controllers;

use common\models\Category;
use yii\web\Controller;
use yii\behaviors\SluggableBehavior;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\imagine\Image;
use Yii;


class CategoryController extends Controller {


    public function actions()
    {
        return [
            'picture-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'picture-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'picture-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}

