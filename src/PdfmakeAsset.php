<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class PdfmakeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/pdfmake';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'build/pdfmake'.(YII_ENV_DEV ? ".js" : ".min.js"),
        'build/vfs_fonts.js',
    ];
}