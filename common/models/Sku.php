<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sku".
 *
 * @property integer $id
 * @property string $sku
 */
class Sku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku'], 'required'],
            [['sku'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'sku' => Yii::t('backend', 'Sku'),
        ];
    }
}
