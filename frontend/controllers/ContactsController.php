<?php
namespace frontend\controllers;

use shop\services\contact\ContactService;
use Yii;
use yii\web\Controller;
use shop\forms\ContactForm;

class ContactsController extends Controller
{
	private $service;

	public function __construct( $id, $module, ContactService $contactService, array $config = [])
	{
		parent::__construct($id, $module, $config);
		$this->service = $contactService;
	}

	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			try{
				$this->service->send($model);
				Yii::$app->session
					->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
			} catch (\Exception $e) {
				Yii::$app->errorHandler->logException($e);
				Yii::$app->session->setFlash('error', 'There was an error sending your message.');
			}
			return $this->refresh();

		}
		return $this->render( 'index', [
			'model' => $model,
		]);
	}
}