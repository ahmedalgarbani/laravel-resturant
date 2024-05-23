@extends('Admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Seo Setting</h4>
            </div>
            <div class="card-body myTable">
                <div class="row">
                    <div class="col-12 col-sm-7 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <form action="{{ route('admin.seoSetting-update') }}" method="post" >

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Seo Title</label>
                                            <input value="{{config('settings.seo_title')}}" name="seo_title" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Seo Description</label>
                                            <textarea  name="seo_description" type="text" class="form-control">
                                                {{config('settings.seo_description')}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Seo Tags</label>
                                            <input name="seo_keywords" value="{{config('settings.seo_keywords')}}" class="form-control inputtags" type="text" placeholder="">
                                        </div>

                                        <br>
                                        <br>
                                        <div class="form-group">

                                            @can('Seo Setting-edit')
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
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap Tags Input plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        // Initialize Bootstrap Tags Input plugin
        $(".inputtags").tagsinput();
    </script>
@endpush
