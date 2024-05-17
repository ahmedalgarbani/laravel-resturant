<?php

namespace App\DataTables;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $edit = "<a class='btn btn-success btn-sm  ' href='".route('admin.product.edit',$query->id)."'> <i class='far fa-edit'></i></a>";
                $delete = "<a class='btn btn-icon btn-danger text-white m-2' data-toggle='modal'  data-target='#modaldemo9' data-del='{{ $query->id }}'>حذف</a>" ;
                $sitting = "<a class='btn btn-dark btn-sm text-white m-2' >gallay</a>" ;
                $setting = '<div class="dropdown d-inline">
                      <button class="btn btn-icon btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-info-circle"></i>
                      </button>
                      <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -132px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="'.route("admin.product.gallary",$query->id).'" ><i class="far fa-heart"></i> Gallary </a>
                        <a class="dropdown-item has-icon"  href="'.route("admin.product.size",$query->id).'" ><i class="far fa-file"></i> Size </a>
                      </div>
                    </div>';
                return $edit.$delete.$setting;
            })->addColumn('image',function ($query){
                return "<img src='".asset($query->thumb_image)."' width='100px'/>";
            })->addColumn('status',function ($query){
                if ($query->status == 1){
                    return '<span class="bage badge-primary rounded">Active </span>';
                }else{
                    return "<span class='bage badge-danger rounded'>inActive </span>";
                }
            })->addColumn('show_at_home',function ($query){
                if ($query->show_at_home == 1){
                    return '<span class="bage badge-primary rounded">Yes </span>';
                }else{
                    return "<span class='bage badge-danger rounded'>No </span>";
                }
            })->addColumn('price',function ($query){
                return currencyPosition($query->price);
            })->addColumn('offer_price',function ($query){
                return currencyPosition($query->offer_price);
            })->addColumn('category',function ($query){
                return Category::findOrFail($query->category_id)->name;
            })
            ->rawColumns(['action','image','status','show_at_home','price','offer_price','category'])->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('name'),
            Column::make('category'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(250)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
