<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
	    '@staticRoot' => $params['staticPath'],
	    '@static'   => $params['staticHostInfo'],
	    '@bower' => '@vendor/bower-asset',
	    '@npm'   => '@vendor/npm'
    ],
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true, 'domain' => 'elisdnshop.dev'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '968979264459-mai0ml35ocu7hu2n009fr2sgs57g3oh8.apps.googleusercontent.com',
                    'clientSecret' => 'RCRhW7bxp5gbP5TmJDl7P5Kg',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '1154898044625935',
                    'clientSecret' => 'f96189d9028ead894322252d92d83d83',
                ],
                'vkontakte' => [
                  'class' => 'yii\authclient\clients\VKontakte',
                  'clientId' => '5817742',
                  'clientSecret' => 'EoFkEHa81HMgGcUK0Knk',
              ],
            ],
        ],

        'backendUrlManager' => require __DIR__ . '/../../backend/config/urlManager.php',
        'frontendUrlManager' => require __DIR__ . '/urlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('frontendUrlManager');
        },

    ],
    'params' => $params,
];
