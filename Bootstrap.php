<?php

namespace abdualiym\contacts;

use yii\base\BootstrapInterface;
use Yii;

/**
 * Contacts module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        Yii::$app->urlManager->addRules(
            [
                'captcha'=>'/site/captcha',
                'feedback' => 'contacts/index',
            ],
            false
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['contact']) && !isset($app->i18n->translations['contact*'])) {
            $app->i18n->translations['contact'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@abdualiym/contacts/messages',
                'sourceLanguage' => 'en',
                'forceTranslation' => true,
            ];
        }
    }
}
