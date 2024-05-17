<?php

namespace App\DataTables;

use App\Models\BannerSlider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannerSliderDataTable extends DataTable
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
                $edit = "<a class='btn btn-success btn-sm  ' href='".route('admin.banner-slider.edit',$query->id)."'><i class='far fa-edit'></i></a>";
                $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'>حذف</a>" ;

                return $edit.$delete;
            })->addColumn('image',function ($query){
                return "<img src='".asset($query->image)."' width='150px'/>";
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
    public function query(BannerSlider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bannerslider-table')
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
            Column::make('title'),
            Column::make('image'),
            Column::make('sub_title'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(140)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BannerSlider_' . date('YmdHis');
    }
}
