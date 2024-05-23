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
            <div class="card-body h-auto myTable">
                <div class="row">
                    <div class="col-12 col-sm-7 col-lg-7">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-control">
                                    <form action="{{route('admin.mail-pusher.setting')}}" method="post">

                                        @csrf
                                        @method('POST')

                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label>MAil Driver</label>
                                                <input type="text" class="form-control" value="{{config('settings.mail_driver')}}" name="mail_driver">
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Mail Host</label>
                                                <input type="text" class="form-control" value="{{config('settings.mail_host')}}" name="mail_host">
                                            </div>
                                            <div class="form-group col-4">
                                                <label>Mail Port</label>
                                                <input type="text" class="form-control" value="{{config('settings.mail_port')}}" name="mail_port">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label>Mail UserName</label>
                                                <input type="text" class="form-control" value="{{config('settings.mail_username')}}" name="mail_username">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Mail Password</label>
                                                <input type="text" class="form-control" value="{{config('settings.mail_password')}}" name="mail_password">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label>Mail encryption</label>
                                            <input type="text" class="form-control" value="{{config('settings.mail_encryption')}}" name="mail_encryption">
                                        </div>
                                        <div class="form-group ">
                                            <label>Mail Form Address</label>
                                            <input type="text" class="form-control" value="{{config('settings.mail_form_address')}}" name="mail_form_address">
                                        </div>
                                        <div class="form-group ">
                                            <label>Mail Receiver</label>
                                            <input type="text" class="form-control" value="{{config('settings.mail_receiver')}}" name="mail_receiver">
                                        </div>


                                        <br>
                                        <br>
                                        <div class="form-group">
                                        @can('Email Setting-edit')
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
