<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of VmsAsset
 *
 * @author VGRovnov
 */
class VmsAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/vzn.css',
        'css/font-awesome.css',
        //'css/owl.carousel.css',
    ];

    public $js = [
        'js/vzn.js',
        'js/npm.js',
        //'js/owl.carousel.js',
        //'js/owl.carousel.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
