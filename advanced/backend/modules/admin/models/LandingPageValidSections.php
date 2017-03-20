<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "landing_page_valid_sections".
 *
 * @property integer $id
 * @property string $value
 */
class LandingPageValidSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing_page_valid_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
        ];
    }
}
