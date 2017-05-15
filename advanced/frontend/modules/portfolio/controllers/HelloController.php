<?php

namespace frontend\modules\portfolio\controllers;

use Yii;
use yii\web\Controller;
use common\models\HelloMessage;
use frontend\modules\portfolio\models\LandingPage;
use frontend\modules\portfolio\models\SeenMessages;
use frontend\modules\portfolio\models\HelloGalleryImages;

class HelloController extends Controller {
	
	public function actionIndex() {

		/*
		* Assigning the Hello page parts to variables
		*/
		$section_header 	  = LandingPage::find()->where(['section' => 1])->one();
		$section_work 		  = LandingPage::find()->where(['section' => 2])->one();
		$section_bio 		  = LandingPage::find()->where(['section' => 3])->one();
		$section_gallery_work = LandingPage::find()->where(['section' => 4])->one();
		$section_contact_form = LandingPage::find()->where(['section' => 5])->one();

		/*
		* Forming models for the Hello page, the seen messages and the in-page gallery
		*/
		$form_model 			= new HelloMessage();
		$seen_message 			= new SeenMessages();

		/*
		* Assigning Hello Page's gallery model to a variable
		*/
		$hello_gallery_models = HelloGalleryImages::find()->all();

		/*
		* Assigning the "$_REQUEST" object to a variable
		*/
		$request = Yii::$app->request;

		/*
		* If data is received through frontend form, the following script is ran
		*/
		if ($form_model->load(Yii::$app->request->post())) {

			/*
			* Constructs the array which contains all the form values
			*/
			$form_values = $this->getFormValues();

			/*
			* Updates the model fields
			*/
			$form_model->name 		= $form_values['name'];
			$form_model->email 		= $form_values['email'];
			$form_model->message 	= $form_values['message'];

			/*
			* Sets validation rules
			*/
			$validation_is_enabled = false;

			/*
			* If the model is saved in the ActiveRecord, the success message
			* will be assigned to the flash memory
			*/
			if ($form_model->save($validation_is_enabled)) {
				$seen_message->message_id = $form_model->id;
				if ($seen_message->save($validation_is_enabled)) {
					Yii::$app->getSession()->setFlash('success', 'Your message has been successfully recorded.');

					/*
					* the unseen message is the deadliest...
					*
					* Counts the total number of unseen messages in the ActiveRecord and
					* if the condition is true, an e-mail will be sent to the admin
					*/
					$unseen_messages = SeenMessages::find()->where(['is_seen' => 0])->count();
					if ($unseen_messages % 5 == 0 && $unseen_messages) {
						$this->sendEmailOnMessageLimit();
					}
				}
			} else {
				Yii::$app->getSession()->setFlash('error', 'Message submission has encountered an error.');
			}
		}
		
		return $this->render('index', [
			'section_header' 		=> $section_header,
			'section_work' 			=> $section_work,
			'section_bio' 			=> $section_bio,
			'section_gallery_work' 	=> $section_gallery_work,
			'section_contact_form' 	=> $section_contact_form,
			'form_model'			=> $form_model,
			'hello_gallery_models'	=> $hello_gallery_models
		]);
	}

	/*
	* Constructs an array which consists of the form's fields values, assigned to an array
	*
	* @return array
	*/
	private function getFormValues($result = []) {
		$table = 'HelloMessage';
		$post_return = Yii::$app->request->post($table);

		$result = [
			'name' 		=> $post_return['name'],
			'email' 	=> $post_return['email'],
			'message' 	=> $post_return['message']
		];

		return $result;
	}

	/*
	* Sends an e-mail to the specified address and with the specified text and credentials
	*/
	protected function sendEmailOnMessageLimit() {
		Yii::$app->mailer->compose()
			->setFrom('admin@hello.com')
			->setTo('moldovanandrei8399@gmail.com')
			->setSubject('New Messages')
			->setHtmlBody('<b>You have new messages! Return to your site\'s admin panel to view them.</b>')
			->send();
	}
	
}