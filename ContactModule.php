<?php

namespace domain\modules\contact;

use Yii;

/**
 * contact module definition class
 */
class ContactModule extends \yii\base\Module
{
    public $controllerNamespace = 'domain\modules\contact\controllers';

    public $defaultRoute = 'contact';

    public $development  = false;
    public $developmentEmail  = 'olimjon@infosystems.uz';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function __construct(string $id, $parent = null, array $config = [])
    {
        parent::__construct($id, $parent, $config);
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/contact/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@domain/modules/contact/messages',
            'fileMap' => [
                'modules/contact/contact' => 'contact.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/contact/' . $category, $message, $params, $language);
    }
}
