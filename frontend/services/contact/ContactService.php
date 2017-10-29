<?php

namespace frontend\services\contact;

use Yii;
use frontend\forms\ContactForm;
use yii\mail\MailerInterface;

class ContactService
{
    private $mailer;

    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param object $form
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function send(ContactForm $form)
    {
        $sent =  $this->mailer->compose()
            ->setTo(Yii::$app->params['supportEmail'])
            ->setFrom($form->email)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$sent){
            throw new \RuntimeException('Sending error.');
        }
    }
}