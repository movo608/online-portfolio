<?php

namespace frontend\modules\portfolio\assets;

use yii\web\AssetBundle;

class GalleryAsset extends AssetBundle {
	
	public $sourcePath = '@frontend/modules/web/assets/gallery';
	
	public $basePath = '@webroot/assets/gallery';
	public $baseUrl = '@web/assets/gallery';
	
	public $css = [
		'css/main.css'
	];
	
	public $js = [
		'js/jquery.min.js',
		'js/skel.min.js',
		'js/main.js'
	];
	
	public $jsOptions = [];
	
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
	
}