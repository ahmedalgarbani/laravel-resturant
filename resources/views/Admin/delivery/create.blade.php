@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Delivery</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.delivery.store') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                            <div class="col-6">
                                <label>Delivery  Name</label>
                                <input class="form-control" name="area_name"
                                       type="text" value="{{old('area_name')}}" >
                            </div>
                        <div class="col-6">
                                <label>Minimum Delivery Time</label>
                                <input class="form-control" name="min_delivery_time"
                                       type="text" value="{{old('min_delivery_time')}}" >
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-6">
                                <label>Max Delivery Time </label>
                                <input class="form-control" name="max_delivery_time"
                                       type="text" value="{{old('max_delivery_time')}}" >
                            </div>
                        <div class="col-6">
                                <label>Delivery Fee</label>
                                <input class="form-control" name="delivery_fee"
                                       type="text" value="{{old('delivery_fee')}}" >
                            </div>
                        </div>


                        {{-- 2 --}}
                        <div class="row">

                            <div class="col-6">
                                <label for="inputName" class="control-label"> status</label>
                                <select name="status" class="form-control SlectBox"  >
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
