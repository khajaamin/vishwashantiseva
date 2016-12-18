<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property string $id
 * @property string $image_file
 * @property string $description
 * @property integer $is_active
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_file', 'description','is_active'], 'required', 'on' => 'insert'],
            [[ 'description','is_active'], 'required', 'on' => 'update'],
            [['image_file'],'file'],
            [['image_file'],'safe'],
            [['is_active'], 'integer'],
            [[ 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_file' => 'Image File',
            'description' => 'Description',
            'is_active' => 'Is Active',
        ];
    }
}
