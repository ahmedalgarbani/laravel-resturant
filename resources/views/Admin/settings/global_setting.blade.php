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
                                    <form action="{{route('admin.setting.update')}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col">
                                                <label>Site Name </label>
                                                <input class="form-control" value="{{config('settings.site_name')}}" name="site_name"
                                                       type="text" >
                                            </div>


                                            <div class="col">
                                                <label>Default Currency </label>
                                                <select class="form-control select2 "  name="default_currency" >
                                                    <option value="">select</option>
                                                    @foreach(config('currencys.currency_list') as $key => $value)
                                                        <option {{config('settings.default_currency') == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Currency Icon </label>
                                                <input class="form-control " value="{{config('settings.currency_icon')}}" name="currency_icon"
                                                       type="text"  >
                                            </div>
                                            <div class="col-6">
                                                <label>Currency Icon position </label>
                                                <select class="form-control "  name="currency_Icon_position" >
                                                    <option {{ config('settings.currency_Icon_position') == 'right' ? 'selected' : '' }} value="right">Right</option>
                                                    <option {{ config('settings.currency_Icon_position') == 'left' ? 'selected' : '' }} value="left">Left</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="row flex justify-center " style="justify-content: center">
                                            <button type="submit" class="btn btn-primary" >Save</button>
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
