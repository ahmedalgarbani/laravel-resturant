@extends('Admin.layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order Preview</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Invoice Header</h4>
            </div>
            <div class="card-body myTable">
                <div class="section-body">
                    <div class="invoice">
                        <div class="invoice-print" id="print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h2>Invoice</h2>
                                        <div class="invoice-number">Order #{{$order->invoice_id}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Deliver To:</strong>
                                                <br>
                                                <strong>Name : </strong>{!! @$order->userAddress->first_name !!}
                                                {!! @$order->userAddress->last_name !!}
                                                <br>
                                                <strong>Phone : </strong>{!! @$order->userAddress->phone !!}
                                                <br>
                                                <strong>Address : </strong>{!! @$order->userAddress->address !!}
                                                <br>
                                                <strong>Aria : </strong>{!! @$order->userAddress->Area->area_name !!}

                                            </address>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Payment Method : </strong><br>
                                                    {{$order->payment_method}}<br>
                                                    <strong>Payment Status : </strong><br>
                                                    @if(strtoupper($order->payment_status) == 'COMPLETED')
                                                        <span class="badge badge-success">COMPLETED</span>
                                                    @elseif (strtoupper($order->payment_status) == 'pending')
                                                        <span class="badge badge-warning">pending</span>
                                                    @else
                                                        <span class="badge badge-danger">{{$order->payment_status}}</span>
                                                    @endif
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Order Status:</strong><br>
                                                    @if($order->order_status == 'delivered')
                                                        <span class="badge badge-success">Delivered</span>
                                                    @elseif ($order->order_status == 'declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                    @else
                                                        <span class="badge badge-warning">{{$order->order_status}}</span>
                                                    @endif


                                                    <br><br>
                                                </address>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Order Status:</strong><br>
                                                @if($order->order_status == 'delivered')
                                                    <span class="badge badge-success">Delivered</span>
                                                @elseif ($order->order_status == 'declined')
                                                    <span class="badge badge-danger">Declined</span>
                                                @else
                                                    <span class="badge badge-warning">{{$order->order_status}}</span>
                                                @endif


                                                <br><br>
                                            </address>
                                        </div>
                                    </div>
                                    <br>

                                </div>

                                <div class="row mt-6">
                                    <div class="col-md-12">
                                        <div class="section-title">Order Summary</div>
                                        <p class="section-lead">All items here cannot be deleted.</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-md">
                                                <tr>
                                                    <th data-width="40">#</th>
                                                    <th>Item</th>
                                                    <th class="text-center">Size & Optional</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-right">Totals</th>
                                                </tr>

                                                @foreach($order->orderItems as $item)
                                                    @php
                                                        $size = json_decode($item->product_size);
                                                        $option = json_decode($item->product_option);
                                                        $price=$item->unit_price;
                                                        $qty=$item->qty;
                                                        $total = 0;
                                                    $productOption = 0;
                                                    foreach ($option as $opt){
                                                        $productOption += $opt->price;
                                                    }
                                                    $total = ($price + $size->price + $productOption) * $qty;


                                                    @endphp
                                                    <tr>
                                                        <th data-width="40">{{++$loop->index}}</th>
                                                        <th>{{$item->product_name}}</th>
                                                        <th>{{$size->name}}({{currencyPosition($size->price)}})

                                                            @foreach($option as $opt)
                                                                <br>
                                                                {{$opt->name}} ({{currencyPosition($opt->price)}})
                                                            @endforeach
                                                        </th>
                                                        <th class="text-center">{{currencyPosition($item->unit_price)}}</th>
                                                        <th class="text-center">{{$item->qty}}</th>
                                                        <th class="text-right">{{currencyPosition($total)}}</th>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                                <div class="col-md-7" id="form-update-state">
                                                    <form action="{{route('admin.order.update',$order->id)}}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Payment Status</label>
                                                            <select class="form-control" name="payment_status" id="">
                                                                <option @if($order->payment_status == 'pending') selected @endif value="pending">Pending</option>
                                                                <option @if($order->payment_status == 'completed') selected @endif value="completed">Completed</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Order Status</label>
                                                            <select class="form-control" name="order_status" id="">
                                                                <option @if($order->order_status == 'pending') selected @endif value="pending">Pending</option>
                                                                <option @if($order->order_status == 'in_proccess') selected @endif value="in_proccess">In Proccess</option>
                                                                <option @if($order->order_status == 'delivered') selected @endif value="delivered">Deliverd</option>
                                                                <option @if($order->order_status == 'declined') selected @endif value="declined">Declined</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-info">update</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Subtotal</div>
                                                    <div class="invoice-detail-value">{{currencyPosition($order->subtotal)}}</div>
                                                </div>
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Shipping</div>
                                                    <div class="invoice-detail-value">{{currencyPosition($order->delivery_charge)}}</div>
                                                </div>
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">{{currencyPosition($order->grand_total)}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-md-right">

                                <button class="btn btn-warning btn-icon icon-left" id="print_Button" onclick="printDiv()"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script type="text/javascript">
        function printDiv() {
            $('#print_Button').hide()
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

    @endpush
