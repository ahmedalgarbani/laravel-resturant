<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/weather-icon/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/toastr.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

        <style>
            .image-preview{
                background-image: url("{{ asset(auth()->user()->avatar) }}");
            background-size:cover;
            background-position:center center;
            }
        </style>


<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    @include('admin.layouts.sidebar')
    <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Profile Page</h1>
                </div>

                <div class="section-body">
                </div>
            </section>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>change information</h4>



                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="avatar" id="image-upload" >
                            </div>
                        </div>

                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" value="{{Auth()->user()->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{Auth()->user()->email}}" class="form-control">
                    </div>
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>change password</h4>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.profile.password.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="section-body">
        </div>
        </section>

    </div>

            <footer class="main-footer">
                <div class="footer-left">
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
    <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('admin/assets/js/page/index-0.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
<script src="{{asset('frontend/assets/js/toastr.min.js')}}"></script>
<script src="{{asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>


<script>
    toastr.options.progressBar = true;
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}")
    @endforeach

    @endif
</script>

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
</script>

@push('scripts')
    <script>
    $(document).ready(function (){
        $('image-preview').css({
            'background-img':'url("{{ asset(auth()->user()->avatar) }}")',
            'background-size':'cover',
            'background-position':'center center'
        })
    })

    </script>
@endpush
</body>
</html>
