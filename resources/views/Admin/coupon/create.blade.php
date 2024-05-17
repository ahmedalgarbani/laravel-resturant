@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.coupon.store') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                            <div class="col-6">
                                <label>Name </label>
                                <input class="form-control" name="name"
                                       type="text" value="{{old('name')}}" >
                            </div>
                        <div class="col-6">
                                <label>Coupon Code </label>
                                <input class="form-control" name="code"
                                       type="text" value="{{old('code')}}" >
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-6">
                                <label>Coupon Quantity </label>
                                <input class="form-control" name="quantity"
                                       type="text" value="{{old('quantity')}}" >
                            </div>
                        <div class="col-6">
                                <label>Minimum Purchase Amount </label>
                                <input class="form-control" name="min_purchase_amount"
                                       type="text" value="{{old('min_purchase_amount')}}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Expired Date </label>
                                <input class="form-control" name="expired_date"
                                       type="date" value="{{old('expired_date')}}"  >
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> Discount Type</label>
                                <select name="discount_type" class="form-control SlectBox"  >
                                    <option selected value="percent"> Percent</option>
                                    <option  value="amount"> Amount</option>

                                </select>
                            </div>
                            <div class="col-6">
                                <label>Discount </label>
                                <input class="form-control" name="discount"
                                       type="text" value="{{old('discount')}}" >
                            </div>
                            <div class="col">
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
