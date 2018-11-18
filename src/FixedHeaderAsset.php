<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class FixedHeaderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-fixedheader';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.fixedHeader'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}