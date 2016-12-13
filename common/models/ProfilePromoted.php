<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile_promoted".
 *
 * @property integer $id
 * @property integer $profile_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $sort_order
 * @property integer $created_by
 * @property integer $updated_by
 */
class ProfilePromoted extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_promoted';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'start_time', 'end_time', 'sort_order', 'created_by', 'updated_by'], 'required'],
            [['profile_id', 'sort_order', 'created_by', 'updated_by'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'sort_order' => 'Sort Order',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
