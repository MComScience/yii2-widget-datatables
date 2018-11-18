<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/jquery.dataTables'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}