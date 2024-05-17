@extends('Admin.layouts.master')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1>why-choose-us</h1>
        </div>
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>sectionTitle</h4>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                <h4>edit section title</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                               <form method="POST" action="{{route('admin.updatetitle')}}">
                                   @csrf
                                   @method('PUT')
                                   <div class="col">
                                       <label>top title </label>
                                       <input class="form-control " name="top_title"
                                              type="text" value="{{ @$titles['why_choose_us_top_title']}}"  >
                                   </div>
                                   <div class="col">
                                       <label>main title </label>
                                       <input class="form-control " name="main_title"
                                              type="text" value="{{ @$titles['why_choose_us_main_title']}}" >
                                   </div>
                                   <div class="col">
                                       <label>sub title </label>
                                       <input class="form-control " name="sub_title"
                                              type="text" value="{{ @$titles['why_choose_us_sub_title']}}" >
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
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Card Header</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.why-choose-us.create')}}" class="btn btn-primary">
                        create one
                    </a>
                </div>
            </div>
            <div class="card-body myTable">
                <div class="card card-primary">

                    <div class="table-responsive">

                        <div class="row"><div class="col-sm-12"><table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">#</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Last name: activate to sort column ascending"> icon</th>
                                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 199.533px;" aria-label="Position: activate to sort column ascending">title </th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">description </th>
                                        <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 79.75px;" aria-label="Salary: activate to sort column ascending">status</th>
                                        <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 79.75px;" aria-label="Salary: activate to sort column ascending">actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; ?>
                                    @foreach($whys as $why)
                                        <tr role="row" class="even">
                                            <?php $i++ ?>
                                            <td class="sorting_1">{{$i}}</td>
                                            <td><i class='{{$why->icon}}' width='100px'></i></td>
                                            <td>{{$why->title}}</td>
                                            <td>{{$why->description}}</td>
                                            <td>

                                                @if($why->status == 1 )
                                                     <span class='bage badge-primary rounded'>Active </span>
                                                @elseif($why->status == 0 )
                                                    <span class='bage badge-danger rounded'>inActive </span>
                                                @endif
                                            </td>
                                            <td>
                                                        <a class="btn btn-outline-success btn-sm"
                                                                href="{{route('admin.why-choose-us.edit',$why->id)}}">تعديل</a>
                                                        <button class="btn btn-outline-danger btn-sm "
                                                                data-why_id="{{ $why->id }}"
                                                                data-why_name="{{ $why->title }}" data-toggle="modal"
                                                                data-target="#modaldemo9">حذف</button>


                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

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
                    <h5 class="modal-title">delete item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('why-choose-us.delete')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" >
                        <input type="text" readonly disabled name="why_name" id="why_name" >
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

        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var why_id = button.data('why_id')
            var why_name = button.data('why_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(why_id)
            modal.find('.modal-body #why_name').val(why_name)

        })


        let table = new DataTable('#myTable');
        oTable = $("#bigtable").dataTable({
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        });

    </script>

{{--    {{$dataTable->scripts(attributes:['type'=>'module']) }}--}}

@endpush
