<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\TodayOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TodayOrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user_name', function ($query){
                return $query->user->name;
            })->addColumn('date', function ($query){
                return date('y-m-d',strtotime($query->created_at));
            })
            ->addColumn('payment_status',function ($query){
                $status = strtoupper($query->payment_status);

                switch ($status) {
                    case 'COMPLETED':
                    case 'COMPLETE':
                        return '<span class="badge badge-success">COMPLETED</span>';
                    case 'PENDING':
                        return '<span class="badge badge-warning">pending</span>';
                    default:
                        return '<span class="badge badge-danger">' . $query->payment_status . '</span>';
                }
            })
            ->addColumn('order_status',function ($query){
                if($query->order_status == 'delivered'){
                    return '<span class="badge badge-success">Delivered</span>';
                }elseif ($query->order_status == 'declined'){
                    return '<span class="badge badge-danger">Declined</span>';
                }else{
                    return '<span class="badge badge-warning">'.$query->order_status.'</span>';
                }
            })

            ->addColumn('action', function ($query){

                $status = '';
                $delete = '';
                $view = '';

                if (\Gate::allows('Order Detaile-list')) {

                    $view = "<a class='btn btn-primary btn-sm ml-2  ' href='".route('admin.order.show',$query->id)."'><i class='fas fa-eye'></i></a>";

                }
                if (\Gate::allows('Order Update-list')) {

                    $status = "<a class='btn btn-warning ml-2 btn-sm  order_status' data-toggle='modal' data-target='#order_model' data-id='{{$query->id}}' href='javascript:;'><i class='fas fa-truck-loading'></i></a>";
                }
                if (\Gate::allows('Order-delete')) {

                    $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'><i class='fas fa-trash'></i></a>" ;
                }



                return $view.$status.$delete;
            })
            ->rawColumns(['payment_status','order_status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->whereDate('created_at',now()->format('y-m-d'))->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('todayorders-table')
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
            Column::make('invoice_id'),
            Column::make('user_name'),
            Column::make('product_qty'),
            Column::make('grand_total'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::make('date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TodayOrders_' . date('YmdHis');
    }
}
