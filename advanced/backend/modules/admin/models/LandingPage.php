<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "landing_page".
 *
 * @property integer $id
 * @property string $section
 * @property string $content_text
 * @property string $content_image
 */
class LandingPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'content_text'], 'required'],
            [['section'], 'string'],
            [['content_text'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'content_text' => 'Content Text',
            'content_image' => 'Content Image',
        ];
    }
}
