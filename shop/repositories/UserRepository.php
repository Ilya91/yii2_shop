<?php

namespace shop\repositories;

//use shop\dispatchers\EventDispatcher;
//use shop\entities\User\User;
use common\models\User;

class UserRepository
{
    /*private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }*/

    public function findByUsernameOrEmail($value)
    {
        return User::find()->andWhere(['or', ['username' => $value], ['email' => $value]])->one();
    }

    public function findByNetworkIdentity($network, $identity)
    {
        return User::find()->joinWith('networks n')->andWhere(['n.network' => $network, 'n.identity' => $identity])->one();
    }

    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    public function getByEmailConfirmToken($token)
    {
        return $this->getBy(['email_confirm_token' => $token]);
    }

    public function getByEmail($email)
    {
        return $this->getBy(['email' => $email]);
    }

    public function getByPasswordResetToken($token)
    {
        return $this->getBy(['password_reset_token' => $token]);
    }

    public function existsByPasswordResetToken($token)
    {
        return (bool) User::findByPasswordResetToken($token);
    }

    /**
     * @param $productId
     * @return iterable|User[]
     */
    public function getAllByProductInWishList($productId)
    {
        return User::find()
            ->alias('u')
            ->joinWith('wishlistItems w', false, 'INNER JOIN')
            ->andWhere(['w.product_id' => $productId])
            ->each();
    }

    public function save(User $user, $validation = true)
    {
        if (!$user->save($validation)) {
            throw new \RuntimeException('Saving error.');
        }
        //$this->dispatcher->dispatchAll($user->releaseEvents());
    }

    public function remove(User $user)
    {
        if (!$user->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        //$this->dispatcher->dispatchAll($user->releaseEvents());
    }

    private function getBy(array $condition)
    {
        if (!$user = User::find()->andWhere($condition)->limit(1)->one()) {
            throw new NotFoundException('User not found.');
        }
        return $user;
    }
}