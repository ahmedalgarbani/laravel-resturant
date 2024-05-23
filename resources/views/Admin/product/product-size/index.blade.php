@extends('Admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <div>
                    <div class="card-header">
                        <h1>Size</h1>
                    </div>
                    <a href="{{route('admin.size.index')}}" class="btn btn-primary mb-3">
                        go back
                    </a>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ADD Size</h4>
                        </div>
                        <div class="card-body myTable">
                            <form action="{{route('admin.size.store')}}" method="POST" >
                                @method('POST')

                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <input type="hidden" name="product_id" value="{{$productId}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="row m-4">
                                    @can('product Size-create')
                                    <button type="submit" class="btn btn-primary"> save </button>
                                    @endcan
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @can('product Size-list')
            <div class="card card-secondary">
                <section class="section">
                    <div class="section-header">
                        <h1> Sizes</h1>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                        <div class="card-body myTable">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example_filter" class="dataTables_filter">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12"><table id="example" class="table key-buttons text-md-nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                                                <th  style="width: 20px;" >name</th>
                                                <th   style="width: 20px;" aria-label="Position: activate to sort column ascending">price</th>
                                                <th   style="width: 20px;">action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($sizes))
                                                <?php $i=0 ?>
                                                @foreach($sizes as $size)
                                                    <?php $i++ ?>
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1">{{$i}}</td>
                                                        <td>{{$size->name}}</td>
                                                        <td>{{currencyPosition($size->price)}}</td>
                                                        <td><button class="btn btn-outline-danger btn-sm "
                                                                    data-del="{{ $size->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#modaldemo9">حذف</button></td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>not data found</td>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

            </section>
            </div>
            @endcan
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <div>
                    <div class="card-header">
                        <h1>Options</h1>
                    </div>
                    <a href="{{route('admin.option.index')}}" class="btn btn-primary mb-3">
                        go back
                    </a>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ADD Size</h4>
                        </div>
                        <div class="card-body myTable">
                            @can('product Variant-create')
                            <form action="{{route('admin.option.store')}}" method="POST" >
                                @method('POST')

                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="product_id" value="{{$productId}}" class="form-control">

                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="row m-4">
                                    <button type="submit" class="btn btn-primary"> save </button>
                                </div>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-secondary">
                <section class="section">
                    <div class="section-header">
                        <h1> variant</h1>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                        @can('product Variant-list')
                        <div class="card-body myTable">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example_filter" class="dataTables_filter">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12"><table id="example" class="table key-buttons text-md-nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 20px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                                                <th  style="width: 20px;" >name</th>
                                                <th   style="width: 20px;" aria-label="Position: activate to sort column ascending">price</th>
                                                <th   style="width: 20px;">action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($options))
                                                <?php $i=0 ?>
                                                @foreach($options as $option)
                                                    <?php $i++ ?>
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1">{{$i}}</td>
                                                        <td>{{$option->name}}</td>
                                                        <td>{{currencyPosition($option->price)}}</td>
                                                        <td><button class="btn btn-outline-danger btn-sm "
                                                                    data-delv="{{$option->id}}"
                                                                    data-toggle="modal"
                                                                    data-target="#modaldemo10">حذف</button></td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>not data found</td>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endcan
                    </div>

                </section>
            </div>
        </div>

    </div>
    <!-- delete -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.size.destroy',2)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="size_id" id="size_id" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 <!-- delete -->
    <div class="modal fade" id="modaldemo10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.option.destroy',2)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="variant_id" id="variant_id" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>

        //deltee
        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var size_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #size_id').val(size_id)

        })
        //deltee
        $('#modaldem10').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var oprion_id = button.data('delv')
            var modal = $(this)
            modal.find('.modal-body #variant_id').val(oprion_id)

        })


    </script>

@endpush
