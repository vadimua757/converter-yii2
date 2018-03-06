<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lo".
 *
 * @property  $sku
 * @property integer $sold
* @property Cities[] $cities
 */
class Sold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sku' => Yii::t('backend', 'Sku'),
//            'sold' => Yii::t('backend', 'Sold'),
        ];
    }
}
