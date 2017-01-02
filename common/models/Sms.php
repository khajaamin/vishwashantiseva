<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Sms extends Model
{
    public $to;
    public $message;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['to', 'message'], 'required']
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'to' => 'Phone Numbers',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function send()
    {
        print_r($this);
    }
}
