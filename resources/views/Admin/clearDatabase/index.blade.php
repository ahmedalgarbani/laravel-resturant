@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Clear DataBase</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <div class="card-body myTable">
                <div class="alert alert-warning alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Warning</div>
                        This Option Will Remove all data on Your DataBase So , Think twice Please.
                    </div>
                        <button value="submit" data-toggle='modal'  data-target='#modaldemo9' type="submit" class="btn btn-danger">Clear All Data</button>
                </div>
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
                    <h5 class="modal-title">حذف بيانات قاعده البيانات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.clearDB')}}" method="get">
                    @method('GET')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية تنظيف قاعده البيانات ؟</p><br>
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
            var slider_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #slider_id').val(slider_id)

        })



    </script>

@endpush
