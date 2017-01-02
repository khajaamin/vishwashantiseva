<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    //'sb/vendor/bootstrap/css/bootstrap.min.css.css',
    'sb/vendor/metisMenu/metisMenu.min.css',
    'sb/vendor/morrisjs/morris.css',
    'sb/vendor/datatables-plugins/dataTables.bootstrap.css',
    'sb/vendor/datatables-responsive/dataTables.responsive.css',
    'sb/dist/css/sb-admin-2.css',
    'sb/vendor/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
//        'sb/vendor/jquery/jquery.min.js',
        //'sb/vendor/bootstrap/js/bootstrap.min.js',
        'sb/vendor/metisMenu/metisMenu.min.js',
        'sb/dist/js/sb-admin-2.js',
     ];
    public $depends = [
        
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
       'yii\web\JqueryAsset'
 
    ];
}
