<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $mother_tongue;
    public $profile_for;
    public $mobile_no;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['profile_for','required'],
            ['mother_tongue','required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['mobile_no','required'],
            ['mobile_no','unique', 'targetClass' => '\common\models\User', 'message' => 'This Mobile Number has already been taken.'],
            [['mobile_no'],'match','pattern'=>'/^[0-9]{10}$/'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->profile_for = $this->profile_for;
        $user->username = $this->username;        
        $user->email = $this->email;
        $user->mobile_no=$this->mobile_no;
        $user->mother_tongue = $this->mother_tongue;

        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
    public function attributeLabels()
    {
    return [
        'username' => \Yii::t('app', 'Username'),
        'profile_for'=>\Yii::t('app', 'Profile For'),
        'password' => \Yii::t('app', 'Password'),
        'mother_tongue'=>\Yii::t('app', 'Mother Tongue'),
        'email'=>\Yii::t('app', 'Email'),
        'mobile_no'=>\Yii::t('app', 'Mobile Number'),
    ];
}
}
