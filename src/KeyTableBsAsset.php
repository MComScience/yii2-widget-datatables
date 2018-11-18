<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class KeyTableBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-keytable-bs';

    /**
     * @var array
     */
    public $css = [
        'css/keyTable.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/keyTable.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}