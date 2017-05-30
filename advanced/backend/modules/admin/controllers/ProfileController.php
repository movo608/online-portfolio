<?php

namespace backend\modules\admin\controllers;

use Yii; // because fucking Yii 2, that's why. If you delete it, it won't fucking work.
use yii\web\Controller; // it fucking includes the fucking controller.
use common\models\User; // it fucking includes the user model.
use yii\web\Session; //it fucking uses the yii session for some fucking reason.
use yii\db\Query; //it fucking includes the yii database commands for some fucking reason.

class ProfileController extends Controller {

	/**
	*
	* main function in the ProfileController,
	* @return mixed
	*
	*/
	public function actionIndex() {
		
		/*
		* initializes session
		*/
		$session = $this::sessionInit(0);
		
		/*
		* gets all the current user's info from the database
		*/
		$user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();

		/*
		* gets the hidden password after filtering it through the $this->passwordHide()
		*/
		$hidden_password = $this->passwordHide($user->unhashed_password);
		
		/*
		* if the form is submitted and the user is not blocked from submitting any more changes,
		* a database command query will be built and executed, along with flash memory messages
		*/
		if (Yii::$app->request->post() && !$user->is_blocked) {
			/*
			* if the session counter is exceeded, the user will be blocked, blocking date will
			* be updated to the database as well as flash memory sets
			*/
			if ($session['counter'] >= 6) {
				$session->setFlash('error', '<span style="font-size: 1.6em">Error!</span> Your profile could not be modified. Request limit exceeded.');

				/*
				* creates and executes the database update query
				*/
				$command = Yii::$app->db->createCommand()
					->update('user', ['is_blocked' => 1], 'user = ' . Yii::$app->user->identity->username)
					->execute();
			} else {
				/*
				* updates the user submitted info to the specified fields
				*/
				$user->save();
				/*
				* increments session 'counter' field
				*/
				$session['counter'] += 2;
				/*
				* sets the success flash memory
				*/
				$session->setFlash('success', '<span style="font-size: 1.6em">Success!</span> Your profile has been successfully modified.');
			}
		} else {
			/*
			* sets the warning flash memory if the user is blocked from submitting
			* any more requests from the server
			*/
			$session->setFlash('warning', '<span style="font-size: 1.6em">Notice!</span> Changes to your profile will not be processed. Request limit exceeded.');
		}
		
		return $this->render('index', [
				'user' => $user,
				'hidden_password' => $hidden_password,
		]);
	}
	
	/**
	* this function hides the password and returns it as a string
	*/
	protected function passwordHide($string) {
	
		$length = strlen($string);
		
		for ($i = 1; $i < $length - 1; $i++) {
			$string[$i] = '*';
		} 
		
		$result = [
			'password' => $string,
			'length' => $length
		];
		
		return $result;
		
	}
	
	/**
	* initializes the session and the 'count' field
	*/
	protected static function sessionInit($init) {
		
		$session = Yii::$app->session;
		$session->open();
		
		$session->set('count', (int) 0);
		
		return $session;
		
	}
}