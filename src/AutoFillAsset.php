<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class AutoFillAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-autofill';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.autoFill'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}