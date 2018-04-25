<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $lo
 * @property string $article
 * @property string $name
 * @property integer $display
 * @property integer $korpus
 * @property integer $ksh
 * @property string $zu
 * @property string $brand
 * @property string $model
 * @property string $komments
 * @property string $marketprice
 * @property string $price
 * @property string $minprice
 * @property integer $idmodel
 * @property integer $amount
 * @property integer $type
 * @property integer $lo_id
 * @property integer $np_status
 * @property integer $proba
 * @property integer $defect
 * @property integer $mvd
 * @property integer $allweight
 * @property integer $vstweight
 * @property integer $pureweight
 * @property integer $marzha
 * @property integer $category
 * @property integer $barcode
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lo' => Yii::t('backend', 'Lo'),
            'lo_id' => Yii::t('backend', 'Lo_id'),
            'type' => Yii::t('backend', 'Type'),
            'article' => Yii::t('backend', 'Article'),
            'name' => Yii::t('backend', 'Name'),
            'display' => Yii::t('backend', 'Display'),
            'korpus' => Yii::t('backend', 'Korpus'),
            'ksh' => Yii::t('backend', 'Ksh'),
            'zu' => Yii::t('backend', 'Zu'),
            'brand' => Yii::t('backend', 'Brand'),
            'model' => Yii::t('backend', 'Model'),
            'komments' => Yii::t('backend', 'Komments'),
            'marketprice' => Yii::t('backend', 'Marketprice'),
            'price' => Yii::t('backend', 'Price'),
            'minprice' => Yii::t('backend', 'Minprice'),
            'idmodel' => Yii::t('backend', 'Idmodel'),
            'amount' => Yii::t('backend', 'Amount'),
            'np_status' => Yii::t('backend', 'NP Status'),
            'proba' => Yii::t('backend', 'Proba'),
            'defect' => Yii::t('backend', 'Defect'),
            'mvd' => Yii::t('backend', 'MVD'),
            'allweight' => Yii::t('backend', 'Allweight'),
            'vstweight' => Yii::t('backend', 'Vstweight'),
            'pureweight' => Yii::t('backend', 'Pureweight'),
            'marzha' => Yii::t('backend', 'Marzha'),
            'category' => Yii::t('backend', 'Category'),
            'barcode' => Yii::t('backend', 'Barcode'),
        ];
    }
    public function upload()
    {

                $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
    }
}
