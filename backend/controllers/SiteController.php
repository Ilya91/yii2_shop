<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use shop\forms\LoginForm;
use shop\services\AuthService;

/**
 * Site controller
 */
class SiteController extends Controller
{

    private $service;

    public function __construct( $id, $module, AuthService $service, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            try{
                $user = $this->service->auth($model);
                Yii::$app->user->login($user, $model->rememberMe ? 3600 * 24 * 30 : 0);
                return $this->goBack();
            }catch (\DomainException $e){
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
