<?php

namespace App\DataTables;

use App\Models\ProductRating;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductRatingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query){
                $delete = '';
                if (\Gate::allows('Product Review-delete')) {
                    $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'>
                            <i class='fa fa-trash' aria-hidden='true'>
                            </i>
                            </a>";

                }

                return $delete;
            })
            ->addColumn('username',function ($query){
                return $query->user->name;
            })
            ->addColumn('product',function ($query){
                return $query->product->name;
            })
            ->addColumn('status',function ($query){
//                if ($query->status == 1){
//                    return '<span class="bage badge-primary rounded">Active </span>';
//                }else{
//                    return "<span class='bage badge-danger rounded'>inActive </span>";
//                }

                $html = '';
                if (\Gate::allows('Product Review-edit')) {
                    $html = '<div class="form-group">
                    <select name="status" class="form-control SlectBox review_status"  data-id="'.$query->id.'"  >
                        <option '.($query->status === 1 ?"selected":"").'  value="1"> active</option>
                        <option '.($query->status === 0 ?"selected":"").'  value="0"> inactive </option>
                    </select>
                </div>';

                }

                return $html;
            })
            ->rawColumns(['action','status','username'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductRating $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productrating-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('username'),
            Column::make('product'),
            Column::make('review'),
            Column::make('rating'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductRating_' . date('YmdHis');
    }
}
