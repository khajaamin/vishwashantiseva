<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "success_stories".
 *
 * @property integer $id
 * @property integer $groom_id
 * @property integer $bride_id
 * @property string $marriage_of_this_groom
 * @property string $setteled_with_this_bride
 * @property string $email
 * @property string $city
 * @property integer $mobile
 * @property string $marriage_date
 * @property string $success_story
 */
class SuccessStories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'success_stories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groom_id', 'bride_id', 'marriage_of_this_groom', 'setteled_with_this_bride', 'email', 'city', 'mobile', 'marriage_date', 'success_story'], 'required'],
            [['groom_id', 'bride_id', 'mobile'], 'integer'],
            [['mobile'], 'match','pattern'=>'/^[0-9]{10}$/'],
            [['marriage_date'], 'safe'],
            [['email'], 'email'],
            [['success_story'], 'string'],
            [['marriage_of_this_groom', 'setteled_with_this_bride', 'email', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groom_id' => 'Groom ID',
            'bride_id' => 'Bride ID',
            'marriage_of_this_groom' => 'Marriage Of This Groom',
            'setteled_with_this_bride' => 'Setteled With This Bride',
            'email' => 'Email',
            'city' => 'City',
            'mobile' => 'Mobile',
            'marriage_date' => 'Marriage Date',
            'success_story' => 'Success Story',
        ];
    }
}
