<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class RowGroupBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-rowgroup-bs';

    /**
     * @var array
     */
    public $css = [
        'css/rowGroup.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css"),
    ];

    /**
     * @var array
     */
    public $js = [
        'js/rowGroup.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}