<?php

namespace shop\services\manage;

use common\models\User;
use shop\forms\manage\User\UserCreateForm;
use shop\forms\manage\User\UserEditForm;
use shop\repositories\UserRepository;
/*use shop\services\newsletter\Newsletter;
use shop\services\RoleManager;
use shop\services\TransactionManager;*/

class UserManageService
{
    private $repository;
    private $roles;
    private $transaction;
    /**
     * @var Newsletter
     */
    private $newsletter;

    public function __construct(
        UserRepository $repository
        /*RoleManager $roles,
        TransactionManager $transaction,
        Newsletter $newsletter*/
    )
    {
        $this->repository = $repository;
        /*$this->roles = $roles;
        $this->transaction = $transaction;
        $this->newsletter = $newsletter;*/
    }

    public function create(UserCreateForm $form)
    {
        $user = User::create(
            $form->username,
            $form->email,
            //$form->phone,
            $form->password
        );
        $this->repository->save($user);
        return $user;

        /*$this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
            $this->newsletter->subscribe($user->email);
        });
        return $user;*/
    }

    public function edit($id, UserEditForm $form)
    {
        $user = $this->repository->get($id);
        $user->edit(
            $form->username,
            $form->email,
            $form->phone
        );
        $this->repository->save($user);
        /*$this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
        });*/
    }

    public function assignRole($id, $role)
    {
        $user = $this->repository->get($id);
        $this->roles->assign($user->id, $role);
    }

    public function remove($id)
    {
        $user = $this->repository->get($id);
        $this->repository->remove($user);
        $this->newsletter->unsubscribe($user->email);
    }
}