<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "seen_messages".
 *
 * @property integer $id
 * @property integer $message_id
 * @property integer $is_seen
 */
class SeenMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seen_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'is_seen'], 'required'],
            [['message_id', 'is_seen'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'is_seen' => 'Is Seen',
        ];
    }
}
