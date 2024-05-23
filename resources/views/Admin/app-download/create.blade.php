@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>App Download</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.appappdownlaod.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row mb-5" >
                        <div class="col-6">
                            <label>image image</label>
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                                <input type="hidden" name="old_image"   value="{{@$appDownload->image}}" >
                            </div>
                        </div>
                        <div class="col-6">
                            <label>background image</label>
                            <div id="image-preview-2" class="image-preview" >
                                <label for="image-upload-2" id="image-label">Choose File</label>
                                <input type="file" name="background" id="image-upload-2" >
                                <input type="hidden" name="old_background" value="{{@$appDownload->background}}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div class="row">



                        <div class="col">
                            <label>title </label>
                            <input class="form-control " name="title"
                                   type="text" value="{{@$appDownload->title}}">
                        </div>

                        <div class="col">
                            <label>short description </label>
                            <input class="form-control" name="short_description"
                                   type="text" value="{{@$appDownload->short_description}}">
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>
                    <h5>Application Store Links</h5>
                    <div class="form-group">
                        <label>Play Store Link <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="play_store_link"
                               type="text" value="{{@$appDownload->play_store_link}}" >
                    </div>
                    <div class="form-group">
                        <label>Apple Store Link <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="apple_store_link"
                               type="text"  value="{{@$appDownload->apple_store_link}}">
                    </div>



                    <br>

@can('App Download-edit')
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"> SAVE</button>
                    </div>
@endcan

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
