<?php

namespace frontend\controllers\auth;

//use common\auth\Identity;
use shop\services\auth\NetworkService;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\authclient\AuthAction;

class NetworkController extends Controller
{
    private $service;

    public function __construct($id, $module, NetworkService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actions()
    {
        return [
            'auth' => [
                'class' => AuthAction::className(),
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess(ClientInterface $client)
    {
        $network = $client->getId();
        $attributes = $client->getUserAttributes();
        //$identity = ArrayHelper::getValue($attributes, 'id');
        //var_dump($attributes);
        try {
            $user = $this->service->auth($network, $attributes);
            Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}