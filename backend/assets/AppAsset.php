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
        // 'sb/vendor/jquery/jquery.min.js',
        'sb/vendor/bootstrap/js/bootstrap.min.js',
        'sb/vendor/metisMenu/metisMenu.min.js',
        'sb/vendor/raphael/raphael.min.js',
        'sb/vendor/morrisjs/morris.min.js',
        'sb/data/morris-data.js',
        'sb/dist/js/sb-admin-2.js',
        'sb/vendor/flot/excanvas.min.js',
        'sb/vendor/flot/jquery.flot.js',
        'sb/vendor/flot/jquery.flot.pie.js',
        'sb/vendor/flot/jquery.flot.resize.js',
        'sb/vendor/flot/jquery.flot.time.js',
        'sb/vendor/flot-tooltip/jquery.flot.tooltip.min.js',
        'sb/data/flot-data.js',
        'sb/vendor/datatables/js/jquery.dataTables.min.js',
        'sb/vendor/datatables-plugins/dataTables.bootstrap.min.js',
        'sb/vendor/datatables-responsive/dataTables.responsive.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        
    ];
}
