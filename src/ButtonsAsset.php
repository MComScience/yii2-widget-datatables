<?php
namespace mcomscience\datatables;

use yii\web\AssetBundle;

class ButtonsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/datatables.net-buttons';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        'js/dataTables.buttons'.(YII_ENV_DEV ? ".js" : ".min.js"),
        'js/buttons.flash'.(YII_ENV_DEV ? ".js" : ".min.js"),
        'js/buttons.html5'.(YII_ENV_DEV ? ".js" : ".min.js"),
        'js/buttons.print'.(YII_ENV_DEV ? ".js" : ".min.js"),
        'js/buttons.colVis'.(YII_ENV_DEV ? ".js" : ".min.js"),
    ];

    /**
     * @var array
     */
    public $depends = [
        'mcomscience\datatables\JSZipAsset',
        'mcomscience\datatables\PdfmakeAsset',
    ];
}