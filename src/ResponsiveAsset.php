<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ResponsiveAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-responsive';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.responsive'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}