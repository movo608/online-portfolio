<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;

class ProfileController extends Controller {
	
	public function actionIndex() {
		
		return $this->render('index', []);
	}
	
}