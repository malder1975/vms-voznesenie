<?php


namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of FontsAsset
 *
 * @author VGRovnov
 */
class FontsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,700,900,900italic,700italic,500italic,500,400italic,300italic,300,100italic,100&subset=latin,cyrillic-ext,cyrillic',
        'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic&subset=latin,cyrillic-ext,cyrillic',
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_HEAD,
        'type' => 'text/css',
    ];
}
