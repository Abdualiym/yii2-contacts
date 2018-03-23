<?php
/**
 * Created by PhpStorm.
 * User: o
 * Date: 3/23/18
 * Time: 3:41 PM
 */

namespace abdualiym\contacts;

use yii\base\BootstrapInterface;

/**
 * Users module bootstrap class.
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
                'feedback' => 'contacts/index',
            ],
            true
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
