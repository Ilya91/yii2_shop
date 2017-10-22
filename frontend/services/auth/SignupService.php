<?php

namespace frontend\services\auth;


use common\models\User;
use frontend\forms\SignupForm;

class SignupService
{
    public function signup(SignupForm $form){

        if (User::find()->where(['username' => $form->username])->one()){
            throw new \DomainException('Username is already exist.');
        }

        if (User::find()->andWhere(['email' => $form->email])->one()){
            throw new \DomainException('Email is already exist.');
        }

        $user = User::signup(
            $form->username,
            $form->email,
            $form->password
        );

        if (!$user->save()){
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }
}