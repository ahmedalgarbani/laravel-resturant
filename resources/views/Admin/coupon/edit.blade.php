@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.coupon.update',$coupon->id) }}" method="post"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                            <div class="col-6">
                                <label>Name </label>
                                <input class="form-control" name="name"
                                       type="text" value="{{$coupon->name}}" >
                            </div>
                        <div class="col-6">
                                <label>Coupon Code </label>
                                <input class="form-control" name="code"
                                       type="text" value="{{$coupon->code}}" >
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-6">
                                <label>Coupon Quantity </label>
                                <input class="form-control" name="quantity"
                                       type="text" value="{{$coupon->quantity}}" >
                            </div>
                        <div class="col-6">
                                <label>Minimum Purchase Amount </label>
                                <input class="form-control" name="min_purchase_amount"
                                       type="text" value="{{$coupon->min_purchase_amount}}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Expired Date </label>
                                <input class="form-control" name="expired_date"
                                       type="date" value="{{$coupon->expired_date}}"  >
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> Discount Type</label>
                                <select name="discount_type" class="form-control SlectBox"  >
                                    <option @if($coupon->discount_type == "percent") selected @endif value="percent"> Percent</option>
                                    <option @if($coupon->discount_type == "amount") selected @endif value="amount"> Amount</option>

                                </select>
                            </div>
                            <div class="col-6">
                                <label>Discount </label>
                                <input class="form-control" name="discount"
                                       type="text" value="{{$coupon->discount}}" >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> status</label>
                                <select name="status" class="form-control SlectBox"  >
                                    <option @if($coupon->status == 1) selected @endif value="1"> Yes</option>
                                    <option @if($coupon->status == 0) selected @endif value="0"> No</option>

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
