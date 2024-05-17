@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Chefs</h1>
        </div>
        <div class="card card-primary">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-action d-block mb-1">
                        <a href="{{route('admin.Testimonial.create')}}" class="btn btn-primary">
                            create one
                        </a>

                        <br>
                    </div>
                    <h4>sectionTitle</h4>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                <h4>edit section title</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                                <form method="POST" action="{{route('admin.Testimonial.updateTitle')}}">
                                    @csrf
                                    @method('POST')
                                    <div class="col">
                                        <label>top title </label>
                                        <input class="form-control " name="top_title"
                                               type="text" value="{{ @$titles['Testimonial_top_title']}}"  >
                                    </div>
                                    <div class="col">
                                        <label>main title </label>
                                        <input class="form-control " name="main_title"
                                               type="text" value="{{ @$titles['Testimonial_main_title']}}" >
                                    </div>
                                    <div class="col">
                                        <label>sub title </label>
                                        <input class="form-control " name="sub_title"
                                               type="text" value="{{ @$titles['Testimonial_sub_title']}}" >
                                    </div>
                                    <div class="mt-5 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary"> SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                    <h5 class="modal-title">حذف chef</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.Testimonial.destroy',1)}}" method="POST">
                    @method('Delete')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="Testimonial_id" id="Testimonial" >
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
            var Testimonial_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #Testimonial').val(Testimonial_id)

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
