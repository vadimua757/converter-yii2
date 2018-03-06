<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lo".
 *
 * @property integer $name
 * @property integer $val
* @property Cities[] $cities
 */
class Lo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'site_id', 'tech', 'gold', 'silver', 'city_id'], 'required'],
            [['name', 'site_id', 'tech', 'gold', 'silver'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('backend', 'Name'),
            'tech' => Yii::t('backend', 'Tech'),
            'gold' => Yii::t('backend', 'Gold'),
            'silver' => Yii::t('backend', 'Silver'),
            'site_id' => Yii::t('backend', 'Site ID'),
            'city_id' => Yii::t('backend', 'City ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return LoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoQuery(get_called_class());
    }

}
