<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Lo]].
 *
 * @see Lo
 */
class LoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Lo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
