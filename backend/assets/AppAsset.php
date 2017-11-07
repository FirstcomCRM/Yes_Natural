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
      'dashgum/css/style.css',
      'dashgum/css/style-responsive.css',
      'dashgum/js/gritter/css/jquery.gritter.css',
      'css/font-awesome/css/font-awesome.min.css',
      'css/site.css',
    ];
    public $js = [
        'dashgum/js/bootstrap.min.js',
        'dashgum/js/jquery.dcjqaccordion.2.7.js',
        'dashgum/js/jquery.scrollTo.min.js',
        'dashgum/js/jquery.nicescroll.js',
        'dashgum/js/jquery.sparkline.js',
        'dashgum/js/common-scripts.js',
        'dashgum/js/gritter/js/jquery.gritter.js',
        'dashgum/js/gritter-conf.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
