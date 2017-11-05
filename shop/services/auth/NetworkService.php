<?php

namespace shop\services\auth;

use common\models\User;
use shop\repositories\UserRepository;

class NetworkService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function auth($network, $attributes)
    {
        $id = $attributes['id'];
        if ($user = $this->users->findByNetworkIdentity($network, $id)) {
            return $user;
        }
        $user = User::signupByNetwork($network, $attributes);
        $this->users->save($user);
        return $user;
    }

    public function attach($id, $network, $identity)
    {
        if ($this->users->findByNetworkIdentity($network, $identity)) {
            throw new \DomainException('Network is already signed up.');
        }
        $user = $this->users->get($id);
        $user->attachNetwork($network, $identity);
        $this->users->save($user);
    }
}