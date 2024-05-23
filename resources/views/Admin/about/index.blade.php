@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.about.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image"  id="image-upload" >
                                <input type="hidden" name="old_image" value="{{@$about->image}}"  >
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Title </label>
                            <input class="form-control" name="title"
                                   type="text" value="{{@$about->title}}" >
                        </div>


                        <div class="col">
                            <label>Main Title </label>
                            <input class="form-control " name="main_title"
                                   type="text" value="{{@$about->main_title}}" >
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-6">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="description" style="display: none;">
                                    {{@$about->description}}
                                </textarea>
                            </div>
                        </div>

                    </div>

                    <div class=" col-md-6 col-6">
                        <label>Video Link </label>
                        <input class="form-control " name="video_link"
                               type="text" value="{{@$about->video_link}}" >
                    </div>
                @can('About-edit')
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

    $(document).ready(function (){
        $('.image-preview').css({
            'background-image':'url({{asset($about->image)}})',
            'background-size':'cover',
            'background-position':'center center'
        })
    })



</script>
@endpush
