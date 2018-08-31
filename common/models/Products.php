<?php

namespace common\models;


use Yii;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $sku
 * @property int $quantity
 * @property string $price
 * @property int $status
 * @property string $model
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property int $category_id
 * @property int $manufacturer_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $base_url
 * @property string $path
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property array $attachments
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Category $category
 * @property Manufacturers $manufacturers
 * @property User $updater
 * @property ProductAttachment[] $productAttachments
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $attachments;

    /**
     * @var array
     */
    public $thumbnail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'productAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku', 'quantity', 'price', 'title', 'body'], 'required'],
            [['quantity', 'status', 'category_id', 'manufacturer_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['body'], 'string'],
            [['attachments', 'thumbnail'], 'safe'],
            [['sku',], 'string', 'max' => 64],
            [['slug', 'title', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['view'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
//            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sku' => Yii::t('app', 'Sku'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Status'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'view' => Yii::t('app', 'View'),
            'category_id' => Yii::t('app', 'Category ID'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer ID'),
            'thumbnail_base_url' => Yii::t('app', 'Thumbnail Base Url'),
            'thumbnail_path' => Yii::t('app', 'Thumbnail Path'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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

    public function getProductAttachments()
    {
        return $this->hasMany(ProductAttachment::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    //get mane instead id
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryName() {
        return $this->category->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasOne(Manufacturers::className(), ['id' => 'manufacturer_id']);
    }

    public function getManufacturerName() {
        return $this->manufacturers->title;
    }

    public function getThumbnail()
    {
        return Html::img($this->thumbnail_base_url . '/' . $this->thumbnail_path,[
            'style' => 'width:10%;'
        ]);
    }

    public function getAttachments()
    {
        $attachments = '';
        foreach ($this->attachments as $key => $value) {
             $attachments .= Html::img($value['base_url'] . '/' . $value['path'],[
                'style' => 'width:10%;'
            ]);
        };
        return $attachments;
    }
}
