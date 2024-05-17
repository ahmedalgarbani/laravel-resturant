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
                                    <form action="{{ route('admin.apperiance-update') }}" method="post">

                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Pick Your Theme Color</label>
                                                    <div class="input-group colorpicker-element">
                                                        <input type="text" value="{{config('settings.color')}}" name="color" class="form-control colorpickerinput" data-colorpicker-id="1">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <span class="colorinput-color bg-primary"></span>

                                            </div>
                                        </div>
                                </div>

                                <br>
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save</button>
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

    <!-- Add Bootstrap and Colorpicker JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"></script>

    <!-- Your script for initializing Colorpicker -->
    <script>
        $(document).ready(function(){
            $(".colorpickerinput").colorpicker({
                format: 'hex',
                component: '.input-group-append',
            });
        });
    </script>
@endpush
