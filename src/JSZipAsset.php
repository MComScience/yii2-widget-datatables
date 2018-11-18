<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class JSZipAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/jszip';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'dist/jszip'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];
}