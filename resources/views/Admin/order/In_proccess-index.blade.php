@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>In Proccess Order</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Oredrs Header</h4>

            </div>
            <div class="card-body myTable" >
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    </div>



    </div>
    <!-- delete -->
    <div class="modal fade " id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.order.delete')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="Order_id" id="Order_id" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="order_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update State</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-7" id="form-update-state">
                        <form action="" id="form-update-order" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            @can('Order Payment Status-list')
                                <div class="form-group">
                                    <label for="">Payment Status</label>
                                    <select class="form-control payment_status" name="payment_status" id="">
                                        <option  value="pending">Pending</option>
                                        <option  value="completed">Completed</option>

                                    </select>
                                </div>
                            @endcan
                            @can('Order Status-list')
                                <div class="form-group">
                                    <label for="">Order Status</label>
                                    <select class="form-control order_status" name="order_status" id="">
                                        <option  value="pending">Pending</option>
                                        <option  value="in_proccess">In Proccess</option>
                                        <option  value="delivered">Delivered</option>
                                        <option  value="declined">Declined</option>
                                    </select>
                                </div>
                        @endcan
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @can('Order Status-update')
                            <button type="submit" class="btn btn-info submit_btn">Save changes</button>
                            @endcan
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@push('scripts')

    <script>
        $(document).ready(function (){
            let order_id=''
            $(document).on('click','.order_status',function (){
                let id = $(this).data('id');
                order_id=id
                let paymentStatus = $('.payment_status');
                let orderStatus = $('.order_status');

                $.ajax({
                    method:'GET',
                    url:'{{route('admin.order.getorder',':id')}}'.replace(':id',order_id),
                    beforeSend:function (){
                    },
                    success:function (response){
                        $('#id').val(id)
                        paymentStatus.val(response.payment_status);
                        orderStatus.val(response.order_status);

                    },
                    error:function (xhr,status,error){
                        // Handle error if needed
                    }
                });
            });

            $("#form-update-order").on('submit',function (e){
                e.preventDefault()
                let formContent = $(this).serialize()
                let order_id = $('#id').val()
                $.ajax({
                    method:'POST',
                    url:'{{route('admin.order.update',':id')}}'.replace(':id',order_id),
                    data:formContent,
                    success:function (response){
                        $('#order_model').modal("hide")
                        $('#order-table').DataTable().draw()
                        toastr.success(response.message)
                    },
                    error:function (xhr,status,error){
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            });


        });

    </script>

    <script>


        //deltee
        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var Order_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #Order_id').val(Order_id)

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
