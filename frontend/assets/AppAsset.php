<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'kandepohe_static/css/style.css',
        'kandepohe_static/css/font-awesome.css',
        'kandepohe_static/css/popup.css',
        'kandepohe_static/css/flexslider.css',
    ];
    public $js = [
        // 'kandepohe_static/js/jquery.min.js',
        'kandepohe_static/js/bootstrap.min.js',
        'kandepohe_static/js/jquery.flexisel.js',
        'kandepohe_static/js/jquery.magnific-popup.js',
          
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
