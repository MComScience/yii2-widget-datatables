<?php
namespace mcomscience\datatables;

use yii\bootstrap\Widget;
use yii\helpers\Json;
use yii\web\View;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2Asset;
use kartik\select2\ThemeBootstrapAsset;

class DataTables extends Widget
{
    public $options = [];

    public $select2 = true;

    public $extensions = [];

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        DataTablesAsset::register($this->view);
        DataTablesBootstrapAsset::register($this->view);
    }

    public function run()
    {
        $this->registerPlugin('DataTable');
    }

    protected function registerPlugin($name)
    {
        $view = $this->getView();
        $id = $this->options['id'];
        $widgetId = str_replace('-', '', preg_replace('/(\w+) (\d+), (\d+)/i', '', $id));
        $options = Json::htmlEncode($this->clientOptions);
        $js = "var dt_{$widgetId} = jQuery('#{$id}').{$name}({$options});";
        $this->registerExtensions();
        $view->registerJs($js);
        $view->registerJs('$.fn.dataTable.ext.errMode = \'throw\';', View::POS_END);
        $this->registerClientEvents();
    }

    protected function registerExtensions()
    {
        if($this->extensions){
            foreach ($this->extensions as $key) {
                $extClassname = $this->getExtensionsClass($key);
                if($extClassname !== null){
                    $extClassname::register($view);
                }
            }
        }
        if ($this->select2) {
            Select2Asset::register($view);
            ThemeBootstrapAsset::register($view);
        }
    }

    protected function getExtensionsClass($key)
    {
        $extensions = [
            'auto-fill' => AutoFillAsset::classname(),
            'auto-fill-bs' => AutoFillBsAsset::classname(),
            'buttons' => ButtonsAsset::classname(),
            'buttons-bs' => ButtonsBsAsset::classname(),
            'col-reorder' => ColReorderAsset::classname(),
            'col-reorder-bs' => ColReorderBsAsset::classname(),
            'fixed-columns' => FixedColumnsAsset::classname(),
            'fixed-columns-bs' => FixedColumnsBsAsset::classname(),
            'fixed-header' => FixedHeaderAsset::classname(),
            'fixed-header-bs' => FixedHeaderBsAsset::classname(),
            'key-table' => KeyTableAsset::classname(),
            'key-table-bs' => KeyTableBsAsset::classname(),
            'responsive' => ResponsiveAsset::classname(),
            'responsive-bs' => ResponsiveBsAsset::classname(),
            'row-group' => RowGroupAsset::classname(),
            'row-group-bs' => RowGroupBsAsset::classname(),
            'row-reorder' => RowReorderAsset::classname(),
            'row-reorder-bs' => RowReorderBsAsset::classname(),
            'scroller' => ScrollerAsset::classname(),
            'scroller-bs' => ScrollerBsAsset::classname(),
            'select' => SelectAsset::classname(),
            'select-bs' => SelectBsAsset::classname(),
        ];
        return ArrayHelper::getValue($extensions, $key, null);
    }
}