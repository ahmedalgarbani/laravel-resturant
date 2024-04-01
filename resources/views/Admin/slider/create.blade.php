@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>offer </label>
                            <input class="form-control" name="offer"
                                   type="text" >
                        </div>


                        <div class="col">
                            <label>title </label>
                            <input class="form-control " name="title"
                                   type="text"  >
                        </div>

                    </div>

                    {{-- 2 --}}
                    <div class="row">
                        <div class="col">
                            <label>sub_title </label>
                            <input class="form-control " name="sub_title"
                                   type="text"  >
                        </div>

                        <div class="col">
                            <label>short_description </label>
                            <input class="form-control " name="short_description"
                                   type="text"  >
                        </div>


                        <div class="col">
                            <label>button link </label>
                            <input class="form-control " name="button_link"
                                   type="text"  >
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">button link status</label>
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
