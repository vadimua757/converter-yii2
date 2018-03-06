<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "valsilver".
 *
 * @property string $kategory
 * @property string $from
 * @property string $to
 * @property integer $ksh
 * @property integer $idmodel
 */
class Valsilver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valsilver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategory', 'from', 'to', 'ksh', 'idmodel'], 'required'],
            [['kategory'], 'string'],
            [['from', 'to'], 'number'],
            [['ksh', 'idmodel'], 'integer'],
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
