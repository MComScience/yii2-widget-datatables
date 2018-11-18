<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class FixedColumnsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-fixedcolumns';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.fixedColumns'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}