<?php

namespace App\DataTables;

use App\Models\AccountManagementSystem;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccountManagementSystemDataTable extends DataTable
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
                if (\Gate::allows('Account Management-edit')) {
                    $edit = "<a class='btn btn-success btn-sm  ' href='".route('admin.AccountManagement.edit',$query->id)."'><i class='far fa-edit'></i></a>";


                }
                if (\Gate::allows('Account Management-delete')) {
                    $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'>
                            <i class='fa fa-trash' aria-hidden='true'>
                            </i>
                            </a>";
                }

                return $edit.$delete;
            })
            ->addColumn('created_at',function ($query){
              if ($query->created_at != null){
                  return date('d M Y',strtotime($query->created_at));
              }else{
                  return "";
              }
            })
            ->addColumns(['image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->select('id', 'avatar', 'name', 'email', 'role', 'created_at');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('accountmanagementsystem-table')
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
            Column::make('email'),
            Column::make('role'),
            Column::make('created_at'),
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
        return 'AccountManagementSystem_' . date('YmdHis');
    }
}
