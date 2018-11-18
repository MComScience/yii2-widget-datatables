<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ColReorderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-colreorder';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.colReorder'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}