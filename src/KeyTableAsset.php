<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class KeyTableAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-keytable';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.keyTable'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}