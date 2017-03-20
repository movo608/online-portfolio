<?php

namespace frontend\modules\portfolio\models;

use Yii;

/**
 * This is the model class for table "gallery_images".
 *
 * @property integer $id
 * @property string $image
 * @property string $thumbnail_image
 * @property string $name
 * @property string $description
 * @property integer $category_id
 */
class GalleryImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'thumbnail_image', 'name', 'description', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['image', 'thumbnail_image', 'name'], 'string', 'max' => 256],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'thumbnail_image' => 'Thumbnail Image',
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category ID',
        ];
    }
}
