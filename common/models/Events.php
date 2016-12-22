<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property string $id
 * @property string $name
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $venue
 * @property string $description
 * @property string $organised_by
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'start_time', 'end_time', 'venue', 'description', 'organised_by'], 'required'],
            [['image_file','date', 'start_time', 'end_time'], 'safe'],
            [['image_file'],'file'],
            [['venue', 'description'], 'string'],
            [['name', 'organised_by'], 'string', 'max' => 255],
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
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'venue' => 'Venue',
            'description' => 'Description',
            'organised_by' => 'Organised By',
        ];
    }
}
