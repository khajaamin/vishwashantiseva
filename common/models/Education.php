<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $education_area
 * @property string $education
 * @property string $start_date
 * @property string $end_date
 * @property string $institute
 * @property string $result
 * @property string $place
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'start_date', 'end_date','education_area','education','institute','result','place'], 'required'],
            [['user_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['education_area', 'education', 'institute', 'result', 'place'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app','ID'),
            'user_id' => \Yii::t('app','User ID'),
            'education_area' => \Yii::t('app','Education Area'),
            'education' => \Yii::t('app','Education'),
            'start_date' => \Yii::t('app','Start Date'),
            'end_date' => \Yii::t('app','End Date'),
            'institute' =>\Yii::t('app','Institute') ,
            'result' => \Yii::t('app','Result'),
            'place' =>\Yii::t('app','Place') ,
        ];
    }
}
