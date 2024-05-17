@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Product</h4>
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
                <form action="{{route('admin.product-review.delete',1)}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="rating_id" id="rating_id" >
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

        $(document).ready(function (){
            $('body').on('change','.review_status',function (){
                let id = $(this).data('id')
                let status = $(this).val()
                $.ajax({
                    method:'Post',
                    url:'{{route('admin.product-review.update')}}',
                    data:{
                        '_token':"{{csrf_token()}}",
                        'status':status,
                        'id':id
                    },
                    success:function (response){
                        toast.success(response.message)
                    },
                    error:function (xhr,status,error){
                        let errors = xhr.responseJSON.errors
                        toastr.error(errors.message)
                    }
                })

            })
        })
        //deltee
        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var rating_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #rating_id').val(rating_id)

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
