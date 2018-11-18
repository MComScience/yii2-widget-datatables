<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class DataTablesBootstrapAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-bs';

    /**
     * @var array
     */
    public $css = [
        'css/dataTables.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css")
    ];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}