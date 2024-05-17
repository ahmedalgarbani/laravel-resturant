@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Social Link</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.socail-link.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}
                    <div class="row mb-5" >
                        <div class="col-6">
                            <div class="col-sm-6 col-md-7">
                                <label >icon</label>
                                <br>
                                <button class="btn btn-primary" data-icon="{{old('icon')}}" name="icon" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text" value="{{old('name')}}">
                        </div>

                        <div class="col">
                            <label>Link </label>
                            <input class="form-control" name="link"
                                   type="text" value="{{old('link')}}">
                        </div>
                    </div>



                    <br>
                    <hr>


                    <div class="col">
                        <label for="inputName" class="control-label">Link Status</label>
                        <select name="status" class="form-control SelectBox"  >
                            <option value="1"> Yes</option>
                            <option value="0"> No</option>
                        </select>
                    </div>
            </div>


                    <br>
                    <hr>
                    <br>



                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"> SAVE</button>
                    </div>


                </form>

            </div>
        </div>
    </section>
    </div>

@endsection


@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload-2",   // Default: .image-upload
            preview_box: "#image-preview-2",  // Default: .image-preview
            label_field: "#image-label-2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });


    </script>
@endpush
