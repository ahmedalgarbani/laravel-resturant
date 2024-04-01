@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.category.store') }}" method="post" e
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">


                            <div class="col-6">
                                <label>Name </label>
                                <input class="form-control" name="name"
                                       type="text"  >
                            </div>


                        </div>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> status</label>
                                <select name="status" class="form-control SlectBox"  >
                                    <option selected value="1"> active</option>
                                    <option  value="0"> inactive</option>

                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> status</label>
                                <select name="show_at_home" class="form-control SlectBox"  >
                                    <option value="1"> Yes</option>
                                    <option selected value="0"> No</option>

                                </select>
                            </div>
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
