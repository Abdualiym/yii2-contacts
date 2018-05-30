<?php

namespace abdualiym\contacts\services;

use abdualiym\contacts\entities\Contact;
use abdualiym\contacts\entities\ContactMessages;
use abdualiym\contacts\forms\ContactForm;
use abdualiym\text\repositories\NotFoundException;
use Yii;
use yii\helpers\VarDumper;
use yii\mail\MailerInterface;

class ContactService
{
    private $adminEmail;
    private $mailer;

    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->adminEmail = $adminEmail;
        $this->mailer = $mailer;
    }

    ##########     Status     ##########

    public function complete($id)
    {
        if (!$contact = ContactMessages::findOne($id)) {
            throw new NotFoundException();
        }
        $contact->complete();
        if (!$contact->save()) {
            throw new \DomainException('save error');
        }
    }

    public function processing($id)
    {
        if (!$contact = ContactMessages::findOne($id)) {
            throw new NotFoundException();
        }
        $contact->processing();
        if (!$contact->save()) {
            throw new \DomainException('save error');
        }
    }

    public function send(ContactForm $form)
    {
        // send to region
        $m = $this->mailer->compose()
            ->setTo(Contact::getEmailBy($form->region, $form->subject))
            ->setFrom(['info@uztelecom.uz' => 'AK "Uztelecom" contact form'])
            ->setReplyTo([$form->email => $form->name, 'info@uztelecom.uz' => 'AK "Uztelecom" contact form'])
            ->setSubject(Contact::getSubjects($form->subject))
            ->setHtmlBody('Имя: ' . $form->name . '<br>Регион: ' . Contact::getRegions($form->region) . '<br>Телефон: ' . $form->phone . '<br>Email: ' . $form->email . '<br>Текст: ' . $form->text);

        if ($form->file) {
            $fileName = Yii::$app->formatter->asTime(time(), "php:d-m-Y_H-i-s") . '-fayl.' . $form->file->extension;
            $fullName = Yii::getAlias('@staticRoot/app/feedback/') . $fileName;
            $form->file->saveAs($fullName);
            $m->attach($fullName);
        }

        if (!$m->send()) {
            throw new \RuntimeException(Yii::t('contact', 'Sending message to branch email error.'));
        }

        // save to DB
        $message = new ContactMessages();
        $message->status = 1;
        $message->region_id = $form->region;
        $message->subject_id = $form->subject;
        $message->name = $form->name;
        $message->phone = $form->phone;
        $message->email = $form->email;
        $message->preferred_answer = $form->preferredAnswer;
        $message->text = $form->text;
        $message->file = $fileName ?? '';
        if ($message->save()) {

            // Send To User
            $m = $this->mailer->compose()
                ->setTo($form->email)
                ->setFrom(['noreply@uztelecom.uz' => 'AK "Uztelecom" contact form'])
                ->setSubject(Contact::getSubjects($form->subject))
                ->setHtmlBody('<div style="text-align: center;"><p>Спасибо за Ваше обращение!</p>
                <p>Регистрационный номер обращения ' . $message->id . '.</p>
            <p>Обращение будет рассмотрено в сроки, установленные Законом Республики Узбекистан</p> 
<p>«Об обращениях физических и юридических лиц».</p>
<p>О статусе рассмотрения Вашего обращения можете узнать, используя форму обратной связи на сайте Компании</p>');

            if (!$m->send()) {
                throw new \RuntimeException(Yii::t('contact', 'Sending message to user email error.'));
            }
        }
    }


}