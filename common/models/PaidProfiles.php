<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paid_profiles".
 *
 * @property string $id
 * @property string $user_id
 * @property string $paid_for_profile_id
 * @property string $date
 * @property integer $status
 */
class PaidProfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paid_profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'paid_for_profile_id'], 'required'],
            [['id', 'user_id', 'paid_for_profile_id', 'status'], 'integer'],
            [['date'], 'safe'],
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
            'paid_for_profile_id' => 'Paid For Profile ID',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
    public function getProfiles()
    {
         return $this->hasOne(Profiles::className(), ['id' => 'paid_for_profile_id']);
    }
    
}
