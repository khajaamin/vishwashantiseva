<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $request_type
 * @property string $status
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender_id', 'receiver_id', 'request_type', 'status'], 'required'],
            [['sender_id', 'receiver_id'], 'integer'],
            [['request_type', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'receiver_id' => 'Receiver ID',
            'request_type' => 'Request Type',
            'status' => 'Status',
        ];
    }
}
