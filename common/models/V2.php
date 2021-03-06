<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v2".
 *
 * @property integer $id
 * @property string $name
 * @property string $display
 * @property string $korpus
 * @property string $price
 * @property string $ksh
 * @property integer $idmodel
 * @property integer $active
 * @property integer $id_defect
 */
class V2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'display', 'korpus', 'price', 'ksh'], 'required'],
            [['idmodel', 'active','id_defect'], 'integer'],
            [['name', 'display', 'korpus', 'price', 'ksh'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'display' => Yii::t('backend', 'Display'),
            'korpus' => Yii::t('backend', 'Korpus'),
            'price' => Yii::t('backend', 'Price'),
            'ksh' => Yii::t('backend', 'Ksh'),
            'idmodel' => Yii::t('backend', 'Idmodel'),
            'id_defect' => Yii::t('backend', 'Id defect'),
            'active' => Yii::t('backend', 'Active'),
        ];
    }
}
