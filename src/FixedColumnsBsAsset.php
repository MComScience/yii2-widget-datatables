<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class FixedColumnsBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-fixedcolumns-bs';

    /**
     * @var array
     */
    public $css = [
        'css/fixedColumns.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/fixedColumns.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}