<div class="tab-pane fade" id="v-pills-address" role="tabpanel"
     aria-labelledby="v-pills-address-tab">
    <div class="fp_dashboard_body address_body">
        <h3>address <a class="dash_add_new_address"><i class="far fa-plus"></i> add new
            </a>
        </h3>
        <div class="fp_dashboard_address">
            <div class="fp_dashboard_existing_address">
                <div class="row">
                    @foreach($addresses as $address)
                    <div class="col-md-6">
                        <div class="fp__checkout_single_address">
                            <div class="form-check">
                                <label class="form-check-label">
                                    @if($address->type == "home")
                                                                    <span class="icon"><i class="fas fa-home"></i>
                                                                        @else
                                                                            <span class="icon"><i class="fas fa-building"></i>
                                                                        @endif
                                                                        </span>
                                    <span class="address">{{$address->type}} | {{$address->address}} , {{$address->area->area_name}}</span>
                                </label>
                            </div>
                            <ul>
                                <li><a class="dash_edit_btn show_edit_section" data-class="edit_section_{{$address->id}}"><i
                                            class="far fa-edit"></i></a></li>
                                <li>

                                    <a class="dash_del_icon" href="address/delete/{{$address->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>


                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="fp_dashboard_new_address ">
                <form action="{{route('address.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <h4>add new address</h4>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <select name="area" id="select_js3">
                                    <option value="">select Area</option>
                                    @foreach($delivery_area as $delivery)
                                    <option value="{{$delivery->id}}">{{$delivery->area_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" value="{{old('first_name')}}" name="first_name"  placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" value="{{old('last_name')}}" name="last_name" placeholder="Last Name">
                            </div>
                        </div>


                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="email" value="{{old('email')}}" name="email" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" value="{{old('phone')}}" name="phone"
                                       placeholder="phone">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                                                <textarea cols="3" rows="4" name="address"
                                                                          placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="fp__check_single_form check_area">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           value="home"
                                            name="type" id="flexRadioDefault1">
                                    <label class="form-check-label"
                                           for="flexRadioDefault1">
                                        home
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="type" value="office"
                                           id="flexRadioDefault2">
                                    <label class="form-check-label"
                                           for="flexRadioDefault2">
                                        office
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button"
                                    class="common_btn cancel_new_address">cancel</button>
                            <button type="submit" class="common_btn">save
                                address</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach($addresses as $address)
                <div class="fp_dashboard_edit_address edit_section_{{$address->id}}">
                    <form action="{{route('address.update',$address->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h4>edit new address</h4>
                            </div>
                            <input type="hidden" name="user_id" value="{{$address->user_id}}">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <select name="area" id="select_js4">
                                        <option value="">select Area</option>
                                        @foreach($delivery_area as $delivery)
                                            <option   @if($address->area->id == $delivery->id) selected @endif value="{{$delivery->id}}">{{$delivery->area_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" value="{{$address->first_name}}" name="first_name"  placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" value="{{$address->last_name}}" name="last_name" placeholder="Last Name">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="email" value="{{$address->email}}" name="email" placeholder="email">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" value="{{$address->phone}}" name="phone"
                                           placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                                                <textarea cols="3" rows="4" name="address"
                                                                          placeholder="Address">{!! $address->address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="fp__check_single_form check_area">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                               value="home"
                                               @if($address->type == "home") checked @endif
                                               name="type" id="flexRadioDefault1">
                                        <label class="form-check-label"
                                               for="flexRadioDefault1">
                                            home
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                               name="type" value="office"
                                               @if($address->type == "office") checked @endif

                                               id="flexRadioDefault2">
                                        <label class="form-check-label"
                                               for="flexRadioDefault2">
                                            office
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button"
                                        class="common_btn cancel_edit_address">cancel</button>
                                <button type="submit" class="common_btn">save
                                    address</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>




@push('scripts')
    <script>



        $(document).ready(function (){
            $('#modaldemo9').on('show.bs.modal',function (event) {
                var button = $(event.relatedTarget)
                var delivery_id = button.data('del')
                var modal = $(this)
                modal.find('.modal-body #delivery_id').val(delivery_id)

            })
            $('.show_edit_section').on('click',function (){
                $('.fp_dashboard_edit_address').hide();

                let className = $(this).data('class');

                $('.' + className).show();
            });
        });
    </script>
@endpush
