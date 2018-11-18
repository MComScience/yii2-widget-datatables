<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ScrollerBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-scroller-bs';

    /**
     * @var array
     */
    public $css = [
        'css/scroller.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/scroller.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}