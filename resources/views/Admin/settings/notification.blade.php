@extends('Admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Notification Settings</h4>
            </div>
            <div class="card-body myTable">
                <div class="row">
                    <div class="col-12 col-sm-7 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <form action="{{route('admin.notify-pusher.update')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col">
                                                <label>App Id  </label>
                                                <input class="form-control" value="{{@config('settings.pusher_app_id')}}" name="pusher_app_id"
                                                       type="text" >
                                            </div>


                                            <div class="col">
                                                <label>Key </label>
                                                <input class="form-control" value="{{@config('settings.pusher_key')}}" name="pusher_key"
                                                       type="text" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Pusher Secret </label>
                                                <input class="form-control" value="{{@config('settings.pusher_secret')}}" name="pusher_secret"
                                                       type="text" >
                                            </div>
                                            <div class="col">
                                                <label>Pusher Cluster  </label>
                                                <input class="form-control" value="{{@config('settings.pusher_cluster')}}" name="pusher_cluster"
                                                       type="text" >
                                            </div>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="row flex justify-center" style="justify-content: center">

                                            @can('Notification Setting-edit')
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
