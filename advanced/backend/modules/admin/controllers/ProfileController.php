<?php

namespace backend\modules\admin\controllers;

use Yii; // because fucking Yii 2, that's why. If you delete it, it won't fucking work.
use yii\web\Controller; // it fucking includes the fucking controller.
use common\models\User; // it fucking includes the user model.
use yii\web\Session; //it fucking uses the yii session for some fucking reason.

class ProfileController extends Controller {

	public function actionIndex() {
		
		$session = $this->sessionInit(0);
		
		$user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
		
		$hidden_password = $this->passwordHide($user->unhashed_password);
		
		if (Yii::$app->request->post()) {
			if ($session['counter'] >= 5) {
				$session->setFlash('error', '<span style="font-size: 1.6em">Error!</span> Your profile could not be modified. Too many requests to be processed.');
			} else {
				$user->save();
				$session['counter'] += 2;
				$session->setFlash('success', '<span style="font-size: 1.6em">Success!</span> Your profile has been successfully modified.');
			}
		}
		
		return $this->render('index', [ 
				'user' => $user,
				'hidden_password' => $hidden_password,
		]);
	}
	
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
	
	protected function sessionInit($init) {
		
		$session = Yii::$app->session;
		$session->open();
		
		$session->set('count', (int) 0);
		
		return $session;
		
	}
}