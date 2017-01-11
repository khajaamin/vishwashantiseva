<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property integer $days
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'days'], 'required'],
            [['price'], 'number'],
            [['days'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'days' => 'Days',
        ];
    }
}
