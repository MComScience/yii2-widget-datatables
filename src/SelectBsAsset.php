<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class SelectBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-select-bs';

    /**
     * @var array
     */
    public $css = [
        'css/select.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/select.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}