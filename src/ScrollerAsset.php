<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ScrollerAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-scroller';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.scroller'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}