<?php

namespace shop\services\contact;

use Yii;
use shop\forms\ContactForm;
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
	 * @param ContactForm $form
	 *
	 * @return void whether the email was sent
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