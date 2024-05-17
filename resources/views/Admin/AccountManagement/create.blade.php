@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Account Create</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.AccountManagement.store') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                            <div class="col-6">
                                <label>Name</label>
                                <input class="form-control" name="name"
                                       type="text" value="{{old('name')}}" >
                            </div>
                        <div class="col-6">
                                <label>Email</label>
                                <input class="form-control" name="email"
                                       type="text" value="{{old('email')}}" >
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-6">
                                <label>password</label>
                                <input class="form-control" name="password"
                                       type="text" value="{{old('password')}}" >
                            </div>
                        <div class="col-6">
                            <label for="inputName" class="control-label"> Role</label>
                            <select name="role" class="form-control SlectBox"  >
                                <option value="user"> User</option>
                                <option value="admin"> Admin</option>
                                <option value="super admin"> Super Admin</option>

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
