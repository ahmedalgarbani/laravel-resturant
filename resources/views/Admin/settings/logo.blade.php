@extends('Admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Settings</h4>
            </div>
            <div class="card-body myTable">
                <div class="row">
                    <div class="col-12 col-sm-7 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <form action="{{ route('admin.logo-update') }}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <label>Logo</label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="logo" id="image-upload">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <label>Footer Logo</label>
                                                <div id="image-preview2" class="image-preview">
                                                    <label for="image-upload2" id="image-label2">Choose File</label>
                                                    <input type="file" name="footer_logo" id="image-upload2">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">


                                            <div class="col-sm-12 col-md-6">
                                                <label>Favicon</label>
                                                <div id="image-preview3" class="image-preview">
                                                    <label for="image-upload3" id="image-label3">Choose File</label>
                                                    <input type="file" name="favicon" id="image-upload3">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <label>Breadcrumb</label>
                                                <div id="image-preview4" class="image-preview">
                                                    <label for="image-upload4" id="image-label4">Choose File</label>
                                                    <input type="file" name="breadcrumb" id="image-upload4">
                                                </div>
                                            </div>
                                        </div>



                                        <br>
                                        <br>
                                        <div class="form-group">

                                            @can('Logo Setting-edit')
                                                <button class="btn btn-primary" type="submit" >Save</button>
                                            @endcan
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

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
            input_field: "#image-upload2",   // Default: .image-upload
            preview_box: "#image-preview2",  // Default: .image-preview
            label_field: "#image-label2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload3",   // Default: .image-upload
            preview_box: "#image-preview3",  // Default: .image-preview
            label_field: "#image-label3",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload4",   // Default: .image-upload
            preview_box: "#image-preview4",  // Default: .image-preview
            label_field: "#image-label4",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
        $(document).ready(function (){
            $('#image-preview').css({
                'background-image':'url({{config('settings.logo')}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })
 $(document).ready(function (){
            $('#image-preview2').css({
                'background-image':'url({{asset(config('settings.footer_logo'))}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })
 $(document).ready(function (){
            $('#image-preview3').css({
                'background-image':'url({{config('settings.favicon')}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })
 $(document).ready(function (){
            $('#image-preview4').css({
                'background-image':'url({{config('settings.breadcrumb')}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })

    </script>

@endpush
