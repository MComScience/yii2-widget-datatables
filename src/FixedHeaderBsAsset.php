<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class FixedHeaderBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-fixedheader-bs';

    /**
     * @var array
     */
    public $css = [
        'css/fixedHeader.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/fixedHeader.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}