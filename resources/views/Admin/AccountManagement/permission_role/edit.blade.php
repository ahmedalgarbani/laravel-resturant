@extends('Admin.layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                           placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    <div class="row">
                        @foreach ($permission as $value)
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                           value="{{ $value->name }}" class="name">
                                    {{ $value->name }}</label>
                                <br />
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


@endsection
