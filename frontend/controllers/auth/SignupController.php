<?php
namespace frontend\controllers\auth;

use shop\services\auth\SignupService;
use Yii;
use yii\web\Controller;
use shop\forms\SignupForm;
use yii\filters\AccessControl;

class SignupController extends Controller
{
	private $service;

	public function __construct( $id, $module, SignupService $service, array $config = [])
	{
		parent::__construct($id, $module, $config);
		$this->service = $service;
	}

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['?'],
					],
				],
			],
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	public function actionSignup()
	{
		$form = new SignupForm();
		if ($form->load(Yii::$app->request->post()) && $form->validate()) {
			try{
				$this->service->signup($form);
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
				return $this->goHome();
			}catch (\DomainException $e){
				Yii::$app->errorHandler->logException($e);
				Yii::$app->session->setFlash('error', $e->getMessage());
			}

		}

		return $this->render('signup', [
			'model' => $form,
		]);
	}


	/**
	 * @param $token
	 * @return mixed
	 */
	public function actionConfirm($token)
	{
		try {
			$this->service->confirm($token);
			Yii::$app->session->setFlash('success', 'Your email is confirmed.');
			return $this->redirect(['login']);
		} catch (\DomainException $e) {
			Yii::$app->errorHandler->logException($e);
			Yii::$app->session->setFlash('error', $e->getMessage());
			return $this->goHome();
		}
	}
}