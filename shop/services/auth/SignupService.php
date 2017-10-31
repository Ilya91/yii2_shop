<?php

namespace shop\services\auth;


use common\models\User;
use shop\forms\SignupForm;
use Yii;
use yii\mail\MailerInterface;
use shop\repositories\UserRepository;

class SignupService
{

    private $mailer;
    private $repository;

    public function __construct(MailerInterface $mailer, UserRepository $repository)
    {
        $this->mailer = $mailer;
        $this->repository = $repository;
    }
    public function signup(SignupForm $form){

        if ($this->repository->findByUsernameOrEmail($form->username)){
            throw new \DomainException('Username is already exist.');
        }

        if ($this->repository->findByUsernameOrEmail($form->email)){
            throw new \DomainException('Email is already exist.');
        }

        $user = User::signup(
            $form->username,
            $form->email,
            $form->password
        );

        $this->repository->save($user, false);

        $sent = $this->mailer
            ->compose(
                ['html' => 'confirm-html', 'text' => 'confirm-text'],
                ['user' => $user]
            )
            ->setFrom($form->email)
            ->setTo($user->email)
            ->setSubject('Signup confirm for ' . Yii::$app->name)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function confirm($token)
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }
        $user = $this->repository->getByEmailConfirmToken($token);

        if (!$user) {
            throw new \DomainException('User is not found.');
        }
        //$user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->repository->save($user);
    }
}