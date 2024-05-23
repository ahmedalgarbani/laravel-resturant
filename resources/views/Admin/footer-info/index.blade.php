@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Footer Information</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.footer-info.update') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label>Short Description </label>
                            <textarea class="form-control " name="short_description"
                                      type="text" >
                                {{@$footer->short_description}}
                            </textarea>
                        </div>

                        <div class="col">
                            <label>Email </label>
                            <input class="form-control" name="email"
                                   type="text" value="{{@$footer->email}}">
                        </div>
                    </div>



                    <br>

                    <div class="row">

                        <div class="col">
                            <label>Phone Number </label>
                            <input class="form-control" name="phone"
                                   type="text" value="{{@$footer->phone}}">
                        </div>

                        <div class="col">
                            <label>Address</label>
                            <textarea class="form-control " name="address"
                                      type="text" >
                                {{@$footer->address}}
                            </textarea>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col form-group">
                        <div class="col">
                            <label>CopyRight</label>
                            <input class="form-control " name="copyright"
                                      type="text" value="{{@$footer->copyright}}">
                        </div>
                    </div>
            </div>


            <br>
            <hr>
            <br>


@can('Footer Information-edit')
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

