@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.contact.store') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}



                        <div class="form-group">
                            <label>Phone Number (1)</label>
                            <input class="form-control" name="phone_one"
                                   type="text" value="{{@$contact->phone_one}}" >
                        </div>



                        <div class="form-group">
                            <label>Phone Number (2)</label>
                            <input class="form-control" name="phone_two"
                                   type="text" value="{{@$contact->phone_two}}">
                        </div>



                        <div class="form-group">
                            <label>Email Number (1)</label>
                            <input class="form-control" name="email_one"
                                   type="email" value="{{@$contact->email_one}}">
                        </div>



                        <div class="form-group">
                            <label>Email Number (2)</label>
                            <input class="form-control" name="email_two"
                                   type="email" value="{{@$contact->email_two}}">
                        </div>



                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address"
                                   type="text" value="{{@$contact->address}}">
                        </div>


                        <div class="form-group">
                            <label>Map Link</label>
                            <input class="form-control" name="map_link"
                                   type="text" value="{{@$contact->map_link}}">
                        </div>




                    <br>

@can('Contact Us-edit')
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"> SAVE</button>
                    </div>
                    @endcan

                </form>

            </div>
        </div>
    </section>
    </div>

@endsection

@push('scripts')


@endpush
