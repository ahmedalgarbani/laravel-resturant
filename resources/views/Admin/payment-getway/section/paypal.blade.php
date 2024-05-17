<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="form-group">
        <form action="{{route('admin.payment-getway.update')}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Paypal Status </label>
                <select class="form-control select2 "  name="paypal_status" >
                    <option value="">select</option>
                    <option {{@$paymentGetway['paypal_status']==1 ? 'selected':''}} value="1">Active</option>
                    <option {{@$paymentGetway['paypal_status']==0 ? 'selected':''}} value="0">inActive</option>
                </select>
            </div>

            <div class="form-group">
                <label>Paypal Account Mode</label>
                <select class="form-control select2 "  name="paypal_account_mode" >
                    <option value="">select</option>
                    <option @if(@$paymentGetway['paypal_account_mode'] == 'sandbox')selected @endif value="sandbox">SandBox</option>
                    <option @if(@$paymentGetway['paypal_account_mode'] == 'live')selected @endif value="live">Live</option>
                </select>
            </div>

            <div class="form-group">
                <label>Paypal Country Name</label>
                <select class="form-control select2 "  name="paypal_country" >
                    <option value="">select</option>
                    @foreach(config('country-list') as $key => $value)
                        <option {{@$paymentGetway['paypal_country'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Paypal Currency Name</label>
                <select class="form-control select2 "  name="paypal_currency" >
                    <option value="">select</option>
                    @foreach(config('currencys.currency_list') as $key => $value)
                        <option  {{@$paymentGetway['paypal_currency'] == $value ? 'selected':''}} value="{{$value}}">{{$key .' - ' . $value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Currency Rate (Per {{config('settings.default_currency')}} ) </label>
                <input class="form-control" value="{{@$paymentGetway['paypal_rate']}}" name="paypal_rate"
                       type="text" >
            </div>

            <div class="form-group">
                <label>Paypal Client Id </label>
                <input class="form-control" value="{{@$paymentGetway['paypal_api_key']}}" name="paypal_api_key"
                       type="text" >
            </div>

            <div class="form-group">
                <label>Paypal secret key </label>
                <input class="form-control" value="{{@$paymentGetway['paypal_secret_key']}}" name="paypal_secret_key"
                       type="text" >
            </div>


            <div class="form-group">
                <label>Image </label>
                <div id="image-preview" class="image-preview">
                    <label for="image-upload">choose image</label>
                    <input id="image-upload"  value="" name="paypal_logo" type="file" >
                </div>


            </div>



            <br>
            <br>            <div class="row flex justify-center " style="justify-content: center">
                <button type="submit" class="btn btn-primary" >Save</button>
            </div>
        </form>

    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function (){
            $('.image-preview').css({
                'background-image':'url({{asset(@$paymentGetway['paypal_logo'])}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>
@endpush
