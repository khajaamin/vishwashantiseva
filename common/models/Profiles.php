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
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'profile_image' => 'Profile Image',
            'date_of_birth' => 'Date Of Birth',
            'marital_status' => 'Marital Status',
            'gender' => 'Gender',
            'country' => 'Country',
            'state' => 'State',
            'description'=>'About Me',
            'city' => 'City',
            'mobile' => 'Mobile',
            'height' => 'Height',
            'weight' => 'Weight',
            'blood_group' => 'Blood Group',
            'complextion' => 'Complextion',
            'built' => 'Built',
            'religion' => 'Religion',
            'caste' => 'Caste',
            'sub_caste' => 'Sub Caste',
            'diet' => 'Diet',
            'birthplace' => 'Birthplace',
            'birthtime' => 'Birthtime',
            'rashi' => 'Rashi',
            'nakshatra' => 'Nakshatra',
            'charan' => 'Charan',
            'nadi' => 'Nadi',
            'gan' => 'Gan',
            'gotra' => 'Gotra',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'income' => 'Income',
            'father' => 'Father',
            'mother' => 'Mother',
            'brothers' => 'No. of Brothers',
            'sisters' => 'No. of Sisters',
            'expected_caste' => 'Expected Caste',
            'expected_min_age' => 'Expected Min Age',
            'expected_max_age' => 'Expected Max Age',
            'expected_min_height' => 'Expected Min Height',
            'expected_max_height' => 'Expected Max Height',
            'expected_education' => 'Expected Education',
            'expected_occupation' => 'Expected Occupation',
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
