<?php

namespace domain\modules\contact\controllers;

use domain\modules\contact\forms\ContactForm;
use domain\modules\contact\ContactModule;
use domain\modules\contact\services\ContactService;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `contact` module
 */
class ContactController extends Controller
{
    private $service;

    public function __construct($id, $module, ContactService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actionIndex()
    {
        $form = new ContactForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->send($form);
                Yii::$app->session->setFlash('success', ContactModule::t('contact', 'Thank you! Your application is accepted!'));
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', ContactModule::t('contact', 'There was an error sending your message.'));
            }
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $form,
        ]);
    }


    public function actionTest($mail = 'a.abdualiym@gmail.com')
    {
        $m = Yii::$app->mailer->compose()
            ->setTo($mail)
            ->setFrom('noreply@infosystems.uz')
            ->setSubject('Test' . date('d-m-Y, H:i:s'))
            ->setHtmlBody('Тест');

        if (!$m->send()) {
            throw new \RuntimeException(\Yii::t('app', 'Sending error.'));
        } else {
            echo 'Ok';
        }
    }


}
