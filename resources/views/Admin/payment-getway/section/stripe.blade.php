<div class="tab-pane fade show " id="stripe" role="tabpanel" aria-labelledby="stripe-tab4">
    <div class="form-group">
        <form action="{{route('admin.stripe-getway.update')}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Stripe Status </label>
                <select class="form-control select2 "  name="stripe_status" >
                    <option value="">select</option>
                    <option {{@$paymentGetway['stripe_status']==1 ? 'selected':''}} value="1">Active</option>
                    <option {{@$paymentGetway['stripe_status']==0 ? 'selected':''}} value="0">inActive</option>
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
                <label>stripe Country Name</label>
                <select class="form-control select2 "  name="stripe_country" >
                    <option value="">select</option>
                    @foreach(config('country-list') as $key => $value)
                        <option {{@$paymentGetway['stripe_country'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Stripe Currency Name</label>
                <select class="form-control select2 "  name="stripe_currency" >
                    <option value="">select</option>
                    @foreach(config('currencys.currency_list') as $key => $value)
                        <option  {{@$paymentGetway['stripe_currency'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Currency Rate (Per {{config('settings.default_currency')}} ) </label>
                <input class="form-control" value="{{@$paymentGetway['stripe_rate']}}" name="stripe_rate"
                       type="text" >
            </div>

            <div class="form-group">
                <label>Stripe Client Id </label>
                <input class="form-control" value="{{@$paymentGetway['stripe_api_key']}}" name="stripe_api_key"
                       type="text" >
            </div>

            <div class="form-group">
                <label>Stripe secret key </label>
                <input class="form-control" value="{{@$paymentGetway['stripe_secret_key']}}" name="stripe_secret_key"
                       type="text" >
            </div>


            <div class="form-group">
                <label>Stripe Image </label>
                <div id="image-preview2" class="image-preview stripe_logo">
                    <label for="image-upload2">choose image</label>
                    <input id="image-upload2"  value="" name="stripe_logo" type="file" >
                </div>


            </div>



            <br>
            <br>            <div class="row flex justify-center " style="justify-content: center">
                @can('Stripe-edit')
                    <button type="submit" class="btn btn-primary" >Save</button>
                @endcan
            </div>
        </form>

    </div>
</div>
@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload2",   // Default: .image-upload
            preview_box: "#image-preview2",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
    </script>

    <script>
        $(document).ready(function (){
            $('.stripe_logo').css({
                'background-image':'url({{asset(@$paymentGetway['stripe_logo'])}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>

@endpush
