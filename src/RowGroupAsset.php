<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class RowGroupAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-rowgroup';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.rowGroup'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}