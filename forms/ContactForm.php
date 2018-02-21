<?php

namespace domain\modules\contact\forms;

use domain\modules\contact\ContactModule;
use yii\base\Model;

class ContactForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $region;
    public $subject;
    public $preferredAnswer;
    public $text;
    public $file;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'region', 'subject', 'preferredAnswer', 'text', 'verifyCode'], 'required'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['phone'], 'match', 'pattern' => '#^[\+]?[0-9]{12}$#'],
            ['email', 'email'],
            [['region', 'subject', 'preferredAnswer'], 'integer'],
            ['text', 'string'],
            [
                'file', 'file', 'skipOnEmpty' => true, // file NOT REQUIRED
                'extensions' => ['zip', 'rar', 'pdf'],
                'checkExtensionByMimeType' => true, // Force for check file by "magic" bytes
                'maxFiles' => 1,
                'maxSize' => 10 * 1024 * 1024 // 10 MB
            ],
//            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => ContactModule::t('contact', 'NAME'),
            'region' => ContactModule::t('contact', 'REGION'),
            'phone' => ContactModule::t('contact', 'CONTACT TELEPHONE NUMBER'),
            'email' => ContactModule::t('contact', 'E-MAIL ADDRESS'),
            'subject' => ContactModule::t('contact', 'ADDRESS SUBJECT'),
            'preferredAnswer' => ContactModule::t('contact', 'HOW DO YOU WANT TO RECEIVE AN ANSWER'),
            'text' => ContactModule::t('contact', 'MESSAGE TEXT'),
            'file' => ContactModule::t('contact', 'ATTACH THE FILE'),
            'verifyCode' => ContactModule::t('contact', 'PROTECTION FROM AUTOMATIC MESSAGES')
        ];
    }
}
