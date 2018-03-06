<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[values]].
 *
 * @see values
 */
class V2Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return values[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return values|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
