<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class SelectAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-select';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.select'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}