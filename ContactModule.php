<?php

namespace abdualiym\contacts;

use Yii;

/**
 * contact module definition class
 */
class ContactModule extends \yii\base\Module
{
    public $development  = false;
    public $developmentEmail  = 'olimjon@infosystems.uz';


    public function init()
    {
        parent::init();
//        $this->registerTranslations();
    }


    public function registerTranslations()
    {
//        Yii::$app->i18n->translations['abdualiym/yii2-contacts/*'] = [
//            'class' => 'yii\i18n\PhpMessageSource',
//            'sourceLanguage' => 'en',
//            'basePath' => '@vendor/abdualiym/contacts/messages',
//            'fileMap' => [
//                'abdualiym/contacts' => 'contact.php',
//            ],
//        ];
//        Yii::$app->i18n->translations['modules/contact/*'] = [
//            'class' => 'yii\i18n\PhpMessageSource',
//            'sourceLanguage' => 'en',
//            'basePath' => '@domain/modules/contact/messages',
//            'fileMap' => [
//                'modules/contact/contact' => 'contact.php',
//            ],
//        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('' . $category, $message, $params, $language);
//        return Yii::t('modules/contact/' . $category, $message, $params, $language);
    }
}
