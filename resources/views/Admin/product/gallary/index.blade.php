@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <a href="{{route('admin.product.index')}}" class="btn btn-primary mb-3">
            go back
        </a>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Add image</h4>
            </div>
            <div class="card-body myTable">
                @can('product Gallary-create')
                <form action="{{route('admin.gallary.store')}}" method="POST" enctype="multipart/form-data">
                    @method('POST')

                    @csrf
                    <div id="image-preview" class="image-preview" >
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" >
                        <input type="hidden" name="productId" value="{{$productId}}" >
                    </div>
                <div class="row m-4">
                    <button type="submit" class="btn btn-primary"> send </button>
                </div>
                </form>
                @endcan
           </div>
        </div>

    </section>
    <section class="section">
        <div class="section-header">
            <h1>All image</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">

            </div>
            @can('product Gallary-list')
            <div class="card-body myTable">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="col-sm-12 col-md-6">
                                <div id="example_filter" class="dataTables_filter">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><table id="example" class="table key-buttons text-md-nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example_info" style="width: 1201px;">
                                    <thead>
                                    <tr role="row">
                                        <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 194px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="2" colspan="2" style="width: 292px;" aria-label="Position: activate to sort column ascending">image</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="3" colspan="3" style="width: 292px;" aria-label="Position: activate to sort column ascending">action</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                        @if(isset($images))
                                            <?php $i=0 ?>
                                        @foreach($images as $img)
                                        <?php $i++ ?>
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">{{$i}}</td>
                                                <td><img src="{{$img->gallary_image}}" width="100"> </td>
                                                <td><button class="btn btn-outline-danger btn-sm "
                                                            data-del="{{ $img->id }}"
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
            @endcan
            </div>
        </div>

    </section>

    <!-- delete -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف صوره</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.gallary.destroy',2)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="img_id" id="img_id" >
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
            var img_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #img_id').val(img_id)

        })


    </script>

@endpush
