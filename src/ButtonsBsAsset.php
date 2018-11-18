<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ButtonsBsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-buttons-bs';

    /**
     * @var array
     */
    public $css = [
        'css/buttons.bootstrap'.(YII_ENV_DEV ? ".css" : ".min.css")
    ];

    /**
     * @var array
     */
    public $js = [
        'js/buttons.bootstrap'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}