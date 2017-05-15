<?php

namespace frontend\modules\portfolio\assets;

use yii\web\AssetBundle;
use yii\web\View;

class GalleryAsset extends AssetBundle {
	
	public $sourcePath = '@frontend/modules/web/assets/gallery';
	
	public $basePath = '@webroot/assets/gallery';
	public $baseUrl = '@web/assets/gallery';
	
	public $css = [
		'css/main.css'
	];
	
	public $js = [
		'js/skel.min.js',
		'js/main.js'
	];
	
	public $jsOptions = [
		'position' => View::POS_END
	];
	
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
	
}