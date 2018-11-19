# yii2-widget-datatables
DataTables plug-in jQuery Javascript library. for Yii2 framework. https://datatables.net

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Install

```
composer require m-comscience/yii2-widget-datatables '@dev'
```

## Usage

Basic:
```php
use mcomscience\datatables\DataTables;

<?=
DataTables::widget([
    'options' => [
        'id' => 'example',
    ],
    'clientOptions' => [
        "deferRender" => true,
        "responsive" => true,
        "autoWidth" => false,
        "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
    ],
]);
?>
```

Ajax data source (arrays)
```php
use mcomscience\datatables\DataTables;
// data source
/*
{
  "data": [
    [
      "Tiger Nixon",
      "System Architect",
      "Edinburgh",
      "5421",
      "2011/04/25",
      "$320,800"
    ],
}
*/
<?=
DataTables::widget([
    'options' => [
        'id' => 'example',
    ],
    'clientOptions' => [
        "ajax" => [
            "url" => "data-array",
            "type" => "GET",
        ],
        "deferRender" => true,
        "responsive" => true,
        "autoWidth" => false,
        "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
    ],
]);
?>
```

Ajax data source (objects)

Controller
```php
use mcomscience\data\DataColumn;
use mcomscience\data\ActionColumn;
use yii\data\ArrayDataProvider;

public function ActionDataPosition()
{
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $query = (new \yii\db\Query())
        ->select([
            'position.*',
        ])
        ->from('position')
        ->all();
    $dataProvider = new ArrayDataProvider([
        'allModels' => $query,
    ]);
    // or
    /*
    use yii\data\ActiveDataProvider;

    $query = Position::find()->where(['status' => 1]);

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'sort' => [
            'defaultOrder' => [
                'created_at' => SORT_DESC,
                'title' => SORT_ASC, 
            ]
        ],
    ]);
    */
    $columns = Yii::createObject([
        'class' => DataColumn::className(),
        'dataProvider' => $dataProvider,
        'formatter' => Yii::$app->formatter,
        'columns' => [
            [
                'attribute' => 'id',
            ],
            [
                'attribute' => 'name',
            ],
            [
                'attribute' => 'position',
            ],
            [
                'attribute' => 'salary',
            ],
            [
                'attribute' => 'start_date',
                'format' => ['date','php:d/m/Y'],
            ],
            [
                'attribute' => 'office',
            ],
            [
                'attribute' => 'extn',
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'viewOptions' => [
                    'title' => Yii::t('yii','View'),
                    //'label' => 'View'
                ],
                'updateOptions' => [
                    'role' => 'modal-remote',
                    'title' => Yii::t('yii','Edit'),
                ],
                'deleteOptions' => [
                    'class' => 'text-danger on-delete',
                    'title' => Yii::t('yii','Delete'),
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'update') {
                        return Url::to(['update', 'id' => $key]);
                    }
                    if ($action == 'delete') {
                        return Url::to(['delete', 'id' => $key]);
                    }
                },
            ],
            /*
            DropdownButton
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {btn1}',
                'dropdown' => true,
                'dropdownButton' => [
                    'label' => 'Actions',
                    'class' => 'btn btn-success'
                ],
                'viewOptions' => [
                    'role' => 'modal-remote',
                    'title' => 'Detail',
                    'label' => 'Detail',
                ],
                'buttons' => [
                    'btn1' => function ($url, $model, $key) {
                        return Html::tag('li', Html::a('Add', $url, ['data-pjax' => 0]));
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'view') {
                        return Url::to(['view', 'id' => $key]);
                    }
                },
            ],
            */
        ],
    ]);
    return ['data' => $columns->renderDataColumns()];
}
```

View
```php
use mcomscience\datatables\DataTables;
// data source
/*
{
  "data": [
    {
      "id": "1",
      "name": "Tiger Nixon",
      "position": "System Architect",
      "salary": "$320,800",
      "start_date": "2011/04/25",
      "office": "Edinburgh",
      "extn": "5421"
    },
}
*/
<?=
DataTables::widget([
    'options' => [
        'id' => 'example',
    ],
    'clientOptions' => [
        "ajax" => [
            "url" => "data-position",
            "type" => "GET",
        ],
        "deferRender" => true,
        "responsive" => true,
        "autoWidth" => false,
        "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "pageLength" => 10,
        "columns" => [
              ["data" => "id", "className" => "text-center"],
              ["data" => "name"],
              ["data" => "position"],
              ["data" => "salary","className" => "text-right"],
              ["data" => "start_date", "type" => "date-uk"],
              ["data" => "office"],
              ["data" => "extn","orderable" => false],
        ],
        "columnDefs" => [
            ["visible" => false, "targets" => [1]], // hidden columns
        ],
    ],
]);
?>
```

Callback Function
```php
use mcomscience\datatables\DataTables;

<?=
DataTables::widget([
    'options' => [
        'id' => 'example',
    ],
    'clientOptions' => [
        "deferRender" => true,
        "responsive" => true,
        "autoWidth" => false,
        "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "drawCallback" => new \yii\web\JsExpression("function ( settings ) {
            var api = this.api();

            // Output the data for the visible rows to the browser's console
            console.log( api.rows( {page:'current'} ).data() );
            
            // Row grouping
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        })"),
        "footerCallback" => new \yii\web\JsExpression("
            function( tfoot, data, start, end, display ) {
                var api = this.api();
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over all pages
                total = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Total over this page
                pageTotal = api
                    .column( 4, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Update footer
                $( api.column( 4 ).footer() ).html(
                    '$'+pageTotal +' ( $'+ total +' total)'
                );
            }
        ")
    ],
]);
?>
```

Extensions:
https://datatables.net/extensions/index
```php
use mcomscience\datatables\DataTables;

<?=
DataTables::widget([
    'options' => [
        'id' => 'example',
    ],
    'extensions' => [
        'responsive', // Dynamically show and hide columns based on the browser size.
        'auto-fill', // Excel-like click and drag copying and filling of data.
        'buttons', // A common framework for user interaction buttons.
        'col-reorder', // Click-and-drag column reordering.
        'fixed-columns' // Fix one or more columns to the left or right of a scrolling table.
        'fixed-header', // Sticky header and / or footer for the table.
        'key-table', // Keyboard navigation of cells in a table, just like a spreadsheet.
        'row-group', // Show similar data grouped together by a custom data point.
        'row-reorder', // Click-and-drag reordering of rows.
        'scroller', // Virtual rendering of a scrolling table for large data sets.
        'select', // Adds row, column and cell selection abilities to a table.
    ],
    'clientOptions' => [
        "ajax" => [
            "url" => Url::base(true) . "/settings/data-source",
            "type" => "GET",
            "complete" => new JsExpression('function(jqXHR, textStatus) {
                  var table = $(\'#example\').DataTable();
                  $(table.buttons(0)[0].node).button(\'reset\');
            }'),
        ],
        "deferRender" => true,
        "responsive" => true,
        "autoWidth" => false,
        "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "autoFill" => true,
        "colReorder" => true,
        "buttons" => [
            [
                "text" => 'Reload',
                "action" => new JsExpression('function ( e, dt, node, config ) {
                    $(node).button(\'loading\');
                    dt.ajax.reload();
                }'),
                "init" => new JsExpression('function ( dt, node, config ) {
                    var that = this;
                    $(node).removeClass("dt-button").addClass("btn btn-sm btn-success"); // custom bootstrap button
                }'),
            ],
        ],
    ],
]);
?>
```

Usage Bootstrap Table widget 
<a href="https://github.com/MComScience/yii2-widget-bootstrap-table" target="_blank">
    yii2-widget-bootstrap-table
</a>

```php
use mcomscience\bstable\BootstrapTable;
echo BootstrapTable::widget([
    'tableOptions' => ['class' => 'table table-hover table-striped','id' => 'tb-example'],
    // ... options
    'datatableOptions' => [
        "clientOptions" => [
            "responsive" => true,
            "autoWidth" => false,
            "deferRender" => true,
        ],
        'clientEvents' => [
            'error.dt' => 'function ( e, settings, techNote, message ){
                e.preventDefault();
                console.error(message);
            }'
        ]
    ],
]);
```
