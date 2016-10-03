<?php



namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of GoogleMapsAsset
 *
 * @author VGRovnov
 */
class GoogleMapsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyA5l5y0pcgxd7n6S_sdb4UcKXN3iFj3Dik&callback=initMap',
    ];


    
}
