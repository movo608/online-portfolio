<?php

namespace backend\modules\admin\controllers;

use backend\modules\admin\models\SeenMessages;
use yii\web\Controller;

class ApiController extends Controller {

	public function actionIndex() {
		
		$new_messages_count = SeenMessages::find()->where(['is_seen' => 0])->count();

		return json_encode($new_messages_count);
	}

}