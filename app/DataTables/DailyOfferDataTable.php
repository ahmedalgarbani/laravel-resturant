<?php

namespace App\DataTables;

use App\Models\DailyOffer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DailyOfferDataTable extends DataTable
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
                $edit = '';
                $delete = '';
                if (\Gate::allows('Daily Offer-edit')) {
                $edit = "<a class='btn btn-success btn-sm' href='".route('admin.slider.edit', $query->id)."'><i class='far fa-edit'></i></a>";
            }
                if (\Gate::allows('Daily Offer-delete')) {
                    $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-pro_id='{{ $query->id }}'>حذف</a>";
                }
                return $edit.$delete;
            })->addColumn('image',function ($query){
                return "<img src='".asset($query->product->thumb_image)."' width='100px'/>";
            })->addColumn('status',function ($query){
                if ($query->status == 1){
                    return '<span class="bage badge-primary rounded">Active </span>';
                }else{
                    return "<span class='bage badge-danger rounded'>inActive </span>";
                }
            })
            ->rawColumns(['action','image','status'])->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DailyOffer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('dailyoffer-table')
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
            Column::make('image'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DailyOffer_' . date('YmdHis');
    }
}
