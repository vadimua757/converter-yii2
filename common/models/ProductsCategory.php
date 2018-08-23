<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 * @property int $parent_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Products[] $products
 * @property ProductsCategory $parent
 * @property ProductsCategory[] $productsCategories
 * @property User $createdBy
 * @property User $updatedBy
 */
class ProductsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'title', 'body', 'thumbnail_base_url', 'thumbnail_path', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['body'], 'string'],
            [['created_by', 'updated_by', 'status', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 512],
            [['slug'], 'string', 'max' => 1024],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'thumbnail_base_url' => Yii::t('app', 'Thumbnail Base Url'),
            'thumbnail_path' => Yii::t('app', 'Thumbnail Path'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'status' => Yii::t('app', 'Status'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ProductsCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProductsCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductsCategoryQuery(get_called_class());
    }
}
