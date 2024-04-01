@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.why-choose-us.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-6 col-md-7">
                                <label >icon</label>
                                <br>
                                <button class="btn btn-primary" name="icon" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>title </label>
                            <input class="form-control" name="title"
                                   type="text" >
                        </div>




                    </div>

                    {{-- 2 --}}
                    <div class="row">
                        <div class="col-6">
                            <label>description </label>
                            <input class="form-control " name="description"
                                   type="text"  >
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label"> status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option value="1"> active</option>
                                <option value="0"> inactive </option>

                            </select>
                        </div>
                    </div>


                    <br>


                    <div class="d-flex justify-content-center mt-5">
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
