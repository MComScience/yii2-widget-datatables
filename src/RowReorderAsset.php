<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class RowReorderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-rowreorder';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.rowReorder'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}