<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "masters".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property integer $is_active
 */
class Masters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type','is_active'], 'required'],
            [['is_active'], 'integer'],
            [['parent_id'], 'safe'],
            [['name', 'type'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'parent_id'=>'Parent Id',
            'is_active' => 'Is Active',
        ];
    }
}
