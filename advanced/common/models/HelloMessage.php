<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hello_message".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class HelloMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hello_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'email', 'message'], 'required'],
            [['id'], 'integer'],
            [['message'], 'string'],
            [['name', 'email'], 'string', 'max' => 128],
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
            'email' => 'Email',
            'message' => 'Message',
        ];
    }
}
