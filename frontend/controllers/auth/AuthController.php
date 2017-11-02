<?php
namespace frontend\controllers\auth;

use shop\services\AuthService;
use Yii;
use yii\web\Controller;
use shop\forms\LoginForm;

class AuthController extends Controller
{
	private $service;

	public function __construct( $id, $module, AuthService $service, array $config = [])
	{
		parent::__construct($id, $module, $config);
		$this->service = $service;
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

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
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}
}