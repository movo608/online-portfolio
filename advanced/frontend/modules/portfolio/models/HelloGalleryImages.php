<?php

namespace frontend\modules\portfolio\models;

use Yii;

/**
 * This is the model class for table "hello_gallery_images".
 *
 * @property integer $id
 * @property string $path
 */
class HelloGalleryImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hello_gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['path'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
        ];
    }
}
