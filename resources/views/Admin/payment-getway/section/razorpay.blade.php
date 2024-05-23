<div class="tab-pane fade show " id="stripe" role="tabpanel" aria-labelledby="stripe-tab4">
    <div class="form-group">
        <form action="{{route('admin.razorpay-getway.update')}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>RazorPay Status </label>
                <select class="form-control select2 "  name="razorpay_status" >
                    <option value="">select</option>
                    <option {{@$paymentGetway['razorpay_status']==1 ? 'selected':''}} value="1">Active</option>
                    <option {{@$paymentGetway['razorpay_status']==0 ? 'selected':''}} value="0">inActive</option>
                </select>
            </div>

{{--            <div class="form-group">--}}
{{--                <label>Paypal Account Mode</label>--}}
{{--                <select class="form-control select2 "  name="paypal_account_mode" >--}}
{{--                    <option value="">select</option>--}}
{{--                    <option @if(@$paymentGetway['paypal_account_mode'] == 'sandbox')selected @endif value="sandbox">SandBox</option>--}}
{{--                    <option @if(@$paymentGetway['paypal_account_mode'] == 'live')selected @endif value="live">Live</option>--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group">
                <label>RazorPay Country Name</label>
                <select class="form-control select2 "  name="razorpay_country" >
                    <option value="">select</option>
                    @foreach(config('country-list') as $key => $value)
                        <option {{@$paymentGetway['razorpay_country'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>RazorPay Currency Name</label>
                <select class="form-control select2 "  name="razorpay_currency" >
                    <option value="">select</option>
                    @foreach(config('currencys.currency_list') as $key => $value)
                        <option  {{@$paymentGetway['razorpay_currency'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Currency Rate (Per {{config('settings.default_currency')}} ) </label>
                <input class="form-control" value="{{@$paymentGetway['razorpay_rate']}}" name="razorpay_rate"
                       type="text" >
            </div>

            <div class="form-group">
                <label>RazorPay Client Id </label>
                <input class="form-control" value="{{@$paymentGetway['razorpay_api_key']}}" name="razorpay_api_key"
                       type="text" >
            </div>

            <div class="form-group">
                <label>RazorPay secret key </label>
                <input class="form-control" value="{{@$paymentGetway['razorpay_secret_key']}}" name="razorpay_secret_key"
                       type="text" >
            </div>


            <div class="form-group">
                <label>RazorPay Image </label>
                <div id="image-preview3" class="image-preview razorpay_logo">
                    <label for="image-upload3">choose image</label>
                    <input id="image-upload3"  value="" name="razorpay_logo" type="file" >
                </div>


            </div>



            <br>
            <br>            <div class="row flex justify-center " style="justify-content: center">
                @can('RazorPay-edit')
                    <button type="submit" class="btn btn-primary" >Save</button>
                @endcan
            </div>
        </form>

    </div>
</div>
@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload3",   // Default: .image-upload
            preview_box: "#image-preview3",  // Default: .image-preview
            label_field: "#image-label3",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
    </script>

    <script>
        $(document).ready(function (){
            $('.razorpay_logo').css({
                'background-image':'url({{asset(@$paymentGetway['razorpay_logo'])}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>

@endpush
