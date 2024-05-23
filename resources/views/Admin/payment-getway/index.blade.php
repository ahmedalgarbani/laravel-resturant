@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Payment Getway</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>all Payment Way</h4>
            </div>
            <div class="card-body myTable ">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            @can('Paypal-list')
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Paypal</a>
                            </li>
                            @endcan
                            @can('Stripe-list')
                            <li class="nav-item">
                                <a class="nav-link" id="stripe-tab4" data-toggle="tab" href="#stripe" role="tab" aria-controls="stripe" aria-selected="false">Stripe</a>
                            </li>
                                @endcan
                                @can('RazorPay-list')
                            <li class="nav-item">
                                <a class="nav-link" id="razorpay-tab4" data-toggle="tab" href="#razorpay" role="tab" aria-controls="razorpay" aria-selected="false">RazorPay</a>
                            </li>
                                @endcan
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10 border-b-2">
                        <div class="tab-content no-padding" id="myTab2Content">
                            @include('Admin.payment-getway.section.paypal')
                            <div class="tab-pane fade" id="stripe" role="tabpanel" aria-labelledby="stripe-tab4">
                                @include('Admin.payment-getway.section.stripe')
                            </div>
                            <div class="tab-pane fade" id="razorpay" role="tabpanel" aria-labelledby="razorpay-tab4">
                                @include('Admin.payment-getway.section.razorpay')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>

@endsection

