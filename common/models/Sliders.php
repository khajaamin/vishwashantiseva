<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $heading
 * @property string $caption
 * @property string $image_file
 * @property integer $active
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $id
 * @property string $heading
 * @property string $caption
 * @property string $image_file
 * @property integer $status
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property integer $is_deleted
 */
class Sliders extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heading', 'caption', 'status'], 'required'],
            [['caption'], 'string'],
            [['status'], 'integer'],
            [['heading'], 'string', 'max' => 255],
            [['image_file'], 'safe'],
            [['image_file'], 'file'],
            
            [['status', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['heading'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'heading' => 'Heading',
            'caption' => 'Caption',
            'image_file' => 'Image File',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
