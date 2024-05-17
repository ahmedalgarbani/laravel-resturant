<div class="tab-pane fade"  id="v-pills-profile" role="tabpanel"
     aria-labelledby="v-pills-profile-tab">
    <div class="fp_dashboard_body" id="print">
        <h3>order list</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr class="t_header">
                        <th>Order</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            <h5>#{{$order->invoice_id}}</h5>
                        </td>
                        <td>
                            <p>{{date('d - F -Y', strtotime($order->created_at))}}</p>
                        </td>
                        <td>
                            @if($order->order_status == 'pending')
                            <span class="active">Complated</span>
                            @elseif($order->order_status == 'in_proccess')
                                <span class="active">In Proccess</span>
                            @elseif($order->order_status == 'delivered')
                                <span class="complete">Delivered</span>
                            @elseif($order->order_status == 'declined')
                                <span class="cancel">Declined</span>

                            @endif

                        </td>
                        <td>
                            <h5>{{currencyPosition($order->grand_total)}}</h5>
                        </td>
                        <td><a class="view_invoice" data-class="invoice_detailes_{{$order->id}}" onclick="viewId('{{$order->id}}')">View Details</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="fp__invoice invoice_detailes_{{$order->id}}" id="invoice_detailes_{{$order->id}}">
            <a class="go_back"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
            <div class="fp__track_order">
                <ul>
                    @if($order->order_status == 'declined')
                    <li class="{{
    in_array($order->order_status,['declined'])? 'declined_status':''}}">order declined</li>
                    @else
                        <li class="{{
    in_array($order->order_status,['pending','in_proccess','delivered','declined'])?
     'active':''}}">order pending</li>

                        <li class="{{
    in_array($order->order_status,['in_proccess','delivered','declined'])?
     'active':''}}">order in process</li>
  <li class="{{
    in_array($order->order_status,['delivered'])?
     'active':''}}">order delivered</li>
@endif

                </ul>
            </div>
            <div class="fp__invoice_header">
                <div class="header_address">
                    <h4>invoice to</h4>
                    <p>{{$order->address}}</p>
                    <p>{{ @$order->userAddress->phone}}</p>
                    <p>{{ @$order->userAddress->email}}</p>
                </div>
                <div class="header_address" style="width: 50%">
                    <p><b style="width: 140px">invoice no: </b><span>{{$order->invoice_id}}</span></p>
                    <p><b style="width: 140px">Order ID:</b> <span> #{{$order->id}}</span></p>
                    <p><b style="width: 140px">Payment Status:</b> <span> {{$order->payment_status}}</span></p>
                    <p><b style="width: 140px">Payment Method:</b> <span> {{$order->payment_method}}</span></p>
                    <p><b style="width: 140px">Transaction Id:</b> <span> {{$order->transaction_id}}</span></p>
                    <p><b style="width: 140px">date:</b> <span>{{date('d-m-y',strtotime($order->created_at))}}</span></p>
                </div>
            </div>
            <div class="fp__invoice_body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                        <tr class="border_none">
                            <th class="sl_no">SL</th>
                            <th class="package">item description</th>
                            <th class="price">Price</th>
                            <th class="qnty">Quantity</th>
                            <th class="total">Total</th>
                        </tr>


                        @foreach($order->orderItems as $item)
                            @php
                                $size = json_decode($item->product_size);
                                $option = json_decode($item->product_option);
                                $price=$item->unit_price;
                                $qty=$item->qty;
                                $total = 0;
                                $totalqty = 0;
                                $productOption = 0;
                                $totalqty +=$qty;

                            foreach ($option as $opt){
                                $productOption += $opt->price;
                            }
                            $total = ($price + $size->price + $productOption) * $qty;

                            @endphp
                        <tr>
                            <td class="sl_no">{{++$loop->index}}</td>
                            <td class="package">
                            <span>{{$item->product_name}}</span>
                                <span class="size">{{$size->name}}({{currencyPosition($size->price)}})</span>
                            @foreach($option as $opt)
                                <br>
                                <span class="coca_cola"> {{$opt->name}} ({{currencyPosition($opt->price)}})</span>
                            @endforeach
                            </td>

                            <td class="price">
                                <b>{{currencyPosition($price)}}</b>
                            </td>
                            <td class="qnty">
                                <b>{{$qty}}</b>
                            </td>
                            <td class="total">
                                <b>{{currencyPosition($total)}}</b>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="package" colspan="3">
                                <b>sub total</b>
                            </td>
                            <td class="qnty">
                                <b>5</b>
                            </td>
                            <td class="total">
                                <b>{{currencyPosition($order->subtotal)}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package coupon" colspan="3">
                                <b>(-) Discount coupon</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total coupon">
                                <b>{{currencyPosition($order->discount)}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package coast" colspan="3">
                                <b>(+) Shipping Cost</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total coast">
                                <b>{{currencyPosition($order->delivery_charge)}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package" colspan="3">
                                <b>Total Paid</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total">
                                <b>{{currencyPosition($order->grand_total)}}</b>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <a class="print_btn common_btn" id="print_Button" onclick="printDiv()" href="#"><i class="far fa-print"></i> print
                PDF</a>

        </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        function viewId(id) {
            $(".fp_dashboard_order").fadeOut();

            $(".fp__invoice").addClass('d-none');
            $(".invoice_detailes_"+id).removeClass('d-none');

        }
    </script>

    <script type="text/javascript">
        function printDiv() {
            $('#print_Button').hide()
            $('#form-update-state').hide()
            $('.fp__track_order').hide()
            $('.go_back').hide()
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>
@endpush
