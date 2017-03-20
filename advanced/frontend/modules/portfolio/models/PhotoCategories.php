<?php

namespace frontend\modules\portfolio\models;

use Yii;

/**
 * This is the model class for table "photo_categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $thumbnail_image
 * @property string $image
 * @property string $description
 */
class PhotoCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'thumbnail_image', 'image', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'thumbnail_image', 'image'], 'string', 'max' => 256],
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
            'name' => 'Name',
            'thumbnail_image' => 'Thumbnail Image',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }
}
