<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ColReorderBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-colreorder-bs';

    /**
     * @var array
     */
    public $css = [
        'css/colReorder.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css")
    ];

    /**
     * @var array
     */
    public $js = [
        'js/colReorder.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}