<?php


namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of IeAsset
 *
 * @author VGRovnov
 */
class IeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js',
    ];

    public $jsOptions = [
        'condition' => 'lt IE9',
        'position' => \yii\web\View::POS_HEAD,
    ];
}
