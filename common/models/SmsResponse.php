<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sms_response".
 *
 * @property integer $id
 * @property string $error_code
 * @property string $error_message
 * @property string $jobid
 * @property integer $number
 * @property string $msg_id
 * @property integer $part_id
 * @property string $message
 * @property string $send_on
 */
class SmsResponse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_response';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['error_code', 'error_message', 'jobid', 'number', 'msg_id', 'part_id', 'message'], 'required'],
            [['error_code', 'error_message', 'jobid', 'msg_id', 'message'], 'string'],
            [['number', 'part_id'], 'integer'],
            [['send_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'error_code' => 'Error Code',
            'error_message' => 'Error Message',
            'jobid' => 'Jobid',
            'number' => 'Number',
            'msg_id' => 'Msg ID',
            'part_id' => 'Part ID',
            'message' => 'Message',
            'send_on' => 'Send On',
        ];
    }
}
