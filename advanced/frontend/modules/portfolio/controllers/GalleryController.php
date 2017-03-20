<?php

namespace frontend\modules\portfolio\controllers;

use yii\web\Controller;
use frontend\modules\portfolio\models\PhotoCategories;
use frontend\modules\portfolio\models\GalleryImages;

class GalleryController extends Controller {
	
	public function actionIndex() {
		
		$categories_models = PhotoCategories::find()->all();
		
		return $this->render('index', [
			'categories_models' => $categories_models
		]);
	}
	
	public function actionCategory($id) {
		
		$images_models = GalleryImages::find()->where(['category_id' => $id])->all();
		
		return $this->render('category', [
			'images_models' => $images_models
		]);
	}
	
}