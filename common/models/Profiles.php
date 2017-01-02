<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $profile_image
 * @property string $date_of_birth
 * @property string $marital_status
 * @property string $gender
 * @property string $country
 * @property string $state
 * @property string $city
 * @property integer $mobile
 * @property double $height
 * @property double $weight
 * @property string $blood_group
 * @property string $complextion
 * @property string $built
 * @property string $religion
 * @property string $caste
 * @property string $sub_caste
 * @property string $diet
 * @property string $birthplace
 * @property string $birthtime
 * @property string $rashi
 * @property string $nakshatra
 * @property integer $charan
 * @property string $nadi
 * @property string $gan
 * @property string $gotra
 * @property string $education
 * @property string $occupation
 * @property string $income
 * @property string $father
 * @property string $mother
 * @property integer $brothers
 * @property integer $sisterstt
 * @property string $expected_caste
 * @property integer $expected_min_age
 * @property integer $expected_max_age
 * @property double $expected_min_height
 * @property double $expected_max_height
 * @property string $expected_education
 * @property string $expected_occupation
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['name','marital_status', 'mobile', 'gender','country', 'state', 'city', 'blood_group'], 'required'],
            [['mobile', 'charan', 'brothers', 'sisters', 'expected_min_age', 'expected_max_age'], 'integer'],
            [['date_of_birth', 'birthtime','profile_image','interested_in','description'], 'safe'],
            [['mobile'],'match','pattern'=>'/^[0-9]{10}$/'],
            [['gender','description'], 'string'],
            [['height','weight', 'expected_min_height', 'expected_max_height'], 'number'],
            [['profile_image'],'file'],
            [['name','marital_status', 'country', 'state', 'city', 'blood_group', 'complextion', 'built', 'religion', 'caste', 'sub_caste', 'diet', 'birthplace', 'rashi', 'nakshatra', 'nadi', 'gan', 'gotra', 'education', 'occupation', 'income', 'father', 'mother', 'expected_caste', 'expected_education', 'expected_occupation','description'], 'string', 'max' => 255], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' =>  \Yii::t('app', 'ID'),
            'user_id' => \Yii::t('app', 'User ID'),
            'name' => \Yii::t('app', 'Name'),
            'profile_image' => \Yii::t('app','Profile Image'),
            'date_of_birth' =>\Yii::t('app', 'Date of Birth'),
            'marital_status' =>\Yii::t('app', 'Marital Status'),
            'gender' =>\Yii::t('app',  'Gender'),
            'country' =>\Yii::t('app', 'Country'),
            'state' => \Yii::t('app', 'State'),
            'description'=>\Yii::t('app','About Me'),
            'city' =>\Yii::t('app', 'City'),
            'mobile' =>\Yii::t('app', 'Mobile Number'),
            'height' =>\Yii::t('app', 'Height'),
            'weight' => \Yii::t('app','Weight'),
            'blood_group' =>\Yii::t('app', 'Blood Group'),
            'complextion' =>\Yii::t('app', 'Complexion'),
            'built' =>\Yii::t('app', 'Built'),
            'religion' =>\Yii::t('app', 'Religion'),
            'caste' => \Yii::t('app', 'Caste'),
            'sub_caste' =>\Yii::t('app', 'Sub Caste'),
            'diet' =>\Yii::t('app',  'Diet'),
            'birthplace' => \Yii::t('app','Place of Birth'),
            'birthtime' =>\Yii::t('app', 'Time of Birth'),
            'rashi' =>\Yii::t('app', 'Rashi'),
            'nakshatra' =>\Yii::t('app', 'Nakshtra '),
            'charan' =>\Yii::t('app', 'Charan'),
            'nadi' =>\Yii::t('app', 'Nadi'),
            'gan' =>\Yii::t('app', 'Gan'),
            'gotra' =>\Yii::t('app', 'Gotra'),
            'education' =>\Yii::t('app', 'Education'),
            'occupation' => \Yii::t('app','Occupation'),
            'income' => \Yii::t('app','Annual Income'),
            'father' => \Yii::t('app',"Father's Name"),
            'mother' => \Yii::t('app', "Mother's Name"),
            'brothers' => \Yii::t('app', 'No. of Brothers'),
            'sisters' => \Yii::t('app', 'No. of Sisters'),
            'expected_caste' => \Yii::t('app', 'Expected Caste'),
            'expected_min_age' => \Yii::t('app', 'Expected Min Age'),
            'expected_max_age' => \Yii::t('app', 'Expected Max Age'),
            'expected_min_height' => \Yii::t('app', 'Expected Min Height'),
            'expected_max_height' => \Yii::t('app', 'Expected Max Height'),
            'expected_education' => \Yii::t('app', 'Expected Education'),
            'expected_occupation' => \Yii::t('app', 'Expected Occupation'),
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['user_id' => 'id']);
    }
    

    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['user_id' => 'id']);
    }

}
