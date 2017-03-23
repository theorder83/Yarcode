<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@app/themes/agency';
    //public $baseUrl = '@web/agecents';
    public $sourcePath = '@frontend/themes/agency/dist';
    public $css = [
        'css/agency.css',
        'css/style.css',
        '//fonts.googleapis.com/css?family=Montserrat:400,700',
        '//fonts.googleapis.com/css?family=Kaushan+Script',
        '//fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic',
        '//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
    ];

    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
        //'js/jquery-scrollspy.js',
        //'js/cbpAnimatedHeader.min.js',
        //'js/classie.js',
        'js/contact_me.js',
        'js/jqBootstrapValidation.js',
        'js/agency.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yarcode\fa\FontAwesomeBundle',
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}

