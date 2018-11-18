<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class RowReorderBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-rowreorder-bs';

    /**
     * @var array
     */
    public $css = [
        'css/rowReorder.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/rowReorder.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}