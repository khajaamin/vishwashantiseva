<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site_setting".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $contact_no
 * @property string $salt
 * @property string $merchant_key
 * @property string $payment_url
 * @property string $smsurl
 * @property double $price_control
 */
class SiteSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'contact_no', 'salt', 'merchant_key', 'payment_url', 'smsurl', 'price_control'], 'required'],
            [['contact_no'], 'integer'],
            [['payment_url', 'smsurl'], 'string'],
            [['price_control'], 'number'],
            [['name', 'email', 'salt', 'merchant_key'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'contact_no' => 'Contact No',
            'salt' => 'Salt',
            'merchant_key' => 'Merchant Key',
            'payment_url' => 'Payment Url',
            'smsurl' => 'Smsurl',
            'price_control' => 'Price Control',
        ];
    }
}
