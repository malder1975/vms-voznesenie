<?php


namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of YaMapsAsset
 *
 * @author VGRovnov
 */
class YaMapsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
    ];

    public $jsOptions = [
        //'position' => \yii\web\View::POS_HEAD,
    ];
}
