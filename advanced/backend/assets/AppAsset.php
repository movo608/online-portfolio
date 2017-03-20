<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    	'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
    	'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
    	'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    	'dist/css/AdminLTE.min.css',
    	'dist/css/skins/_all-skins.min.css',
    ];
    
    public $js = [
    	'plugins/jQuery/jquery-2.2.3.min.js',
    	'bootstrap/js/bootstrap.min.js',
    	'plugins/fastclick/fastclick.js',
    	'plugins/sparkline/jquery.sparkline.min.js',
    	'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    	'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    	'plugins/slimScroll/jquery.slimscroll.min.js',
    	'plugins/chartjs/Chart.min.js',
    	'dist/js/pages/dashboard2.js',
    	'dist/js/demo.js',
    	'dist/js/app.min.js',
    	'dist/js/header.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    public function init() {
    	$this->jsOptions['position'] = View::POS_END;
    	parent::init();
    }
}
