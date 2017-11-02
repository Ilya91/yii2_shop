<?php
namespace frontend\controllers\auth;

use shop\services\auth\PasswordResetService;
use Yii;
use yii\web\Controller;
use shop\forms\PasswordResetRequestForm;
use shop\forms\ResetPasswordForm;
use yii\web\BadRequestHttpException;

class ResetController extends Controller
{
	private $service;

	public function __construct( $id, $module, PasswordResetService $service, array $config = [])
	{
		parent::__construct($id, $module, $config);
		$this->service = $service;
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequest()
	{
		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($this->service->request($model)) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->goHome();
			} else {
				Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
			}
		}

		return $this->render('request', [
			'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionConfirm($token)
	{
		//$service = Yii::$container->get(PasswordResetService::class);

		try {
			$this->service->validateToken($token);
		} catch (\DomainException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		$form = new ResetPasswordForm();
		if ($form->load(Yii::$app->request->post()) && $form->validate()) {
			try {
				$this->service->reset($token, $form);
				Yii::$app->session->setFlash('success', 'New password saved.');
			} catch (\DomainException $e) {
				Yii::$app->errorHandler->logException($e);
				Yii::$app->session->setFlash('error', $e->getMessage());
			}
			return $this->goHome();
		}

		return $this->render('confirm', [
			'model' => $form,
		]);
	}
}