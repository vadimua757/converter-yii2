<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "valgold".
 *
 * @property string $kategory
 * @property string $from
 * @property string $to
 * @property integer $ksh
 * @property integer $idmodel
 */
class Valgold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valgold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategory', 'from', 'to', 'ksh', 'idmodel'], 'required'],
            [['from', 'to'], 'number'],
            [['ksh', 'idmodel'], 'integer'],
            [['kategory'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kategory' => Yii::t('backend', 'Kategory'),
            'from' => Yii::t('backend', 'From'),
            'to' => Yii::t('backend', 'To'),
            'ksh' => Yii::t('backend', 'Ksh'),
            'idmodel' => Yii::t('backend', 'Idmodel'),
        ];
    }
}
