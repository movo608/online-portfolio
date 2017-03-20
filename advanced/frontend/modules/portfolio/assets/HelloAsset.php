<?php

namespace frontend\modules\portfolio\assets;

use yii\web\AssetBundle;

class HelloAsset extends AssetBundle {
	
	public $sourcePath = '@frontend/modules/web/assets/hello';
	
	public $basePath = '@webroot/assets/hello';
	public $baseUrl = '@web/assets/hello';
	
	public $css = [
		'css/main.css'
	];
	
	public $js = [
		'js/jquery.min.js',
		'js/jquery.poptrox.min.js',
		'js/jquery.scrolly.min.js',
		'js/jquery.scrollex.min.js',
		'js/skel.min.js',
		'js/util.js',
		'js/main.js'
	];
	
	public $jsOptions = [];
	
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
	
}