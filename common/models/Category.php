<?php
/**
 * Created by PhpStorm.
 * User: melnichuk.vs
 * Date: 15.08.2018
 * Time: 11:04
 */
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use kartik\tree\models\TreeTrait;
use kartik\tree\TreeView;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use creocoder\nestedsets\NestedSetsBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
//use yii\imagine\Image;



/**
 * @property string $slug
 * @property string $base_url
 * @property string $path
 * @property string $file
 *
 */

class Category extends \kartik\tree\models\Tree
{
    /**
     * @var
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_categories';
    }

    /**
     * Note overriding isDisabled method is slightly different when
     * using the trait. It uses the alias.
     */

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['slug', 'safe'];
        $rules[] = ['description', 'safe'];
        $rules[] = ['file', 'safe'];
        $rules[] = ['base_url', 'safe'];
        $rules[] = ['path', 'safe'];
        return $rules;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors [] =
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true
            ];
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'picture',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ];
        return $behaviors;
    }


//    public function isDisabled()
//    {
//        if (Yii::$app->user->username !== 'admin') {
//            return true;
//        }
//        return $this->parentIsDisabled();
//    }
}