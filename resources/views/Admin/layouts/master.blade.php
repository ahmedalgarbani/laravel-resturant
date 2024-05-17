<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Fast Food</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('admin/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/modules/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/weather-icon/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/bootstrap-iconpicker.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('admin.layouts.sidebar')
        <!-- Main Content -->
        <div class="main-content">
           @yield('content')

            <footer class="main-footer">
            <div class="footer-left">
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>
</div>




<!-- Internal Data tables -->
<script src="{{URL::asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

<script src="{{ URL::asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('admin/assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('admin/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- General JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- JQuery min js -->
<script src="{{URL::asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/jquery.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/popper.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/tooltip.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/moment.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/stisla.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>

<!-- JS Libraies -->
<script src="{{URL::asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/chart.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{URL::asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{URL::asset('admin/assets/js/page/index-0.js')}}"></script>
    <script src="{{URL::asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<!-- Template JS File -->
<script src="{{URL::asset('admin/assets/js/scripts.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/custom.js')}}"></script>
<script src="{{URL::asset('//cdn.datatables.net/2.0.3/js/dataTables.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>--}}
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
@stack('scripts')
</body>
</html>
