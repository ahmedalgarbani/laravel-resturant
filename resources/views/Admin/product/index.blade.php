@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Product</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                        create one
                    </a>
                </div>
            </div>
            <div class="card-body myTable">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    </div>

    <!-- delete -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف منتج</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('product.delete')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="product_id" id="product_id" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    </div>

@endsection

@push('scripts')
    <script>

        //deltee
        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var product_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #product_id').val(product_id)

        })


        let table = new DataTable('#myTable');
        oTable = $("#bigtable").dataTable({
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        });

    </script>
    {{$dataTable->scripts(attributes:['type'=>'module']) }}

@endpush
