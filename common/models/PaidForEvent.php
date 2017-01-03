<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paid_for_event".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $status
 */
class PaidForEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paid_for_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id', 'status'], 'required'],
            [['user_id', 'event_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'event_id' => 'Event ID',
            'status' => 'Status',
        ];
    }
    public function getEvents()
    {
         return $this->hasOne(Events::className(), ['id' => 'event_id']);
    }
}
