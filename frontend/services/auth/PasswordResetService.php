<?php

namespace frontend\services\auth;

use frontend\forms\PasswordResetRequestForm;
use frontend\forms\ResetPasswordForm;
use common\repositories\UserRepository;
use Yii;
use common\models\User;
use yii\mail\MailerInterface;

class PasswordResetService
{
    private $supportEmail;
    private $mailer;
    private $repository;

    public function __construct($supportEmail, MailerInterface $mailer, UserRepository $repository)
    {
        $this->supportEmail = $supportEmail;
        $this->mailer = $mailer;
        $this->repository = $repository;
    }

    public function request(PasswordResetRequestForm $form)
    {
        /* @var $user User */
        $user = $this->repository->getByEmail($form->email);

        if (!$user) {
            throw new \DomainException('User is not active.');
        }
        $user->requestPasswordReset();
        $this->repository->save($user);

        /*if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }*/

        $sent = $this->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom($this->supportEmail)
            ->setTo($user->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
        return $sent;
    }

    public function validateToken($token)
    {
        if (empty($token) || !is_string($token)) {
            throw new \DomainException('Password reset token cannot be blank.');
        }
        if (!User::findByPasswordResetToken($token)) {
            throw new \DomainException('Wrong password reset token.');
        }
    }

    public function reset($token, ResetPasswordForm $form)
    {
        $user = User::findByPasswordResetToken($token);

        if (!$user) {
            throw new \DomainException('Wrong password reset token.');
        }

        $user->resetPassword($form->password);

        $this->repository->save($user);
    }
}