@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chef Create</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.chef.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <label>Chef image</label>
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                            </div>
                        </div>

                    </div>
                    <div class="row">



                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text"  >
                        </div>

                        <div class="col">
                            <label>Title </label>
                            <input class="form-control" name="title"
                                   type="text" >
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>
                    <h5>Social Media </h5>
                    <div class="form-group">
                        <label>Facebook <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="fb"
                               type="text"  >
                    </div>
                    <div class="form-group">
                        <label>LinkedIn <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="in"
                               type="text"  >
                    </div>
                    <div class="form-group">
                        <label>X <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="x"
                               type="text"  >
                    </div>
                    <div class="form-group">
                        <label> WebSite <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="web"
                               type="text"  >
                    </div>





                    {{-- 2 --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="inputName" class="control-label">Show at home</label>
                            <select name="show_at_home" class="form-control SlectBox"  >
                                <option value="1"> Yes </option>
                                <option value="0"> No </option>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="inputName" class="control-label">status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option value="1"> active</option>
                                <option value="0"> inactive </option>

                            </select>
                        </div>
                    </div>


                    <br>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"> SAVE</button>
                    </div>


                </form>

            </div>
        </div>
    </section>
    </div>

@endsection

@push('scripts')


@endpush
