<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property integer $phone
 * @property string $email
 * @property string $message
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'message'], 'required'],
            [['email'], 'email'],
            [['phone'], 'match','pattern'=>'/^[0-9]{10}$/'],
            [['message'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app','ID'),
            'name' => \Yii::t('app','Name'),
            'phone' => \Yii::t('app','Mobile Number'),
            'email' => \Yii::t('app','Email'),
            'message' => \Yii::t('app','Message'),
        ];
    }
}
