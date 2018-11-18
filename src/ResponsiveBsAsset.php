<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ResponsiveBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-responsive-bs';

    /**
     * @var array
     */
    public $css = [
        'css/responsive.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/responsive.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}