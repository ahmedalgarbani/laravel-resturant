<?php

namespace App\DataTables;

use App\Models\Chef;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ChefDataTable extends DataTable
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
                if (\Gate::allows('Chef-edit')) {

                    $edit = "<a class='btn btn-success btn-sm  ' href='".route('admin.chef.edit',$query->id)."'><i class='far fa-edit'></i></a>";

                }
                if (\Gate::allows('Chef-delete')) {

                    $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'>حذف</a>" ;
                }

                return $edit.$delete;
            })->addColumn('image',function ($query){
                return "<img src='".asset($query->image)."' width='100px'/>";
            })->addColumn('status',function ($query){
                if ($query->status == 1){
                    return '<span class="bage badge-primary rounded">Active </span>';
                }else{
                    return "<span class='bage badge-danger rounded'>inActive </span>";
                }
            })->addColumn('show_at_home',function ($query){
                if ($query->show_at_home == 1){
                    return '<span class="bage badge-success rounded">Yes </span>';
                }else{
                    return "<span class='bage badge-danger rounded'>No </span>";
                }
            })
            ->rawColumns(['action','image','status','show_at_home'])->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Chef $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('chef-table')
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
            Column::make('name'),
            Column::make('image'),
            Column::make('title'),
            Column::make('show_at_home'),
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
        return 'Chef_' . date('YmdHis');
    }
}
