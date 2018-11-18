<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class AutoFillBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables-autofill-bs';

    /**
     * @var array
     */
    public $css = [
        'css/autoFill.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/autoFill.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}