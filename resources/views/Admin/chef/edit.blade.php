@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chef Edit</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.chef.update',$chef->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <label>Chef image</label>
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                                <input type="hidden" name="old_image" value="{{$chef->image}}">
                                <input type="hidden" name="chef_id" value="{{$chef->id}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Title </label>
                            <input class="form-control" name="title"
                                   type="text"  value="{{$chef->title}}">
                        </div>


                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text" value="{{$chef->name}}" >
                        </div>

                    </div>

                    <br>
                    <hr>
                    <br>
                    <h5>Social Media </h5>
                    <div class="form-group">
                        <label>Facebook <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="fb"
                               type="text"  value="{{$chef->fb}}" >
                    </div>
                    <div class="form-group">
                        <label>LinkedIn <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="in"
                               type="text" value="{{$chef->in}}" >
                    </div>
                    <div class="form-group">
                        <label>X <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="x"
                               type="text"  value="{{$chef->x}}" >
                    </div>
                    <div class="form-group">
                        <label> WebSite <code>*leave it empty if you dont have (Optional)</code> </label>
                        <input class="form-control " name="web"
                               type="text" value="{{$chef->web}}" >
                    </div>





                    {{-- 2 --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="inputName" class="control-label">Show at home</label>
                            <select name="show_at_home" class="form-control SlectBox"  >
                                <option @if($chef->show_at_home ==1) selected @endif value="1"> Yes </option>
                                <option @if($chef->show_at_home == 0) selected @endif value="0"> No </option>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="inputName" class="control-label">status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option @if($chef->status ==1) selected @endif  value="1"> active</option>
                                <option @if($chef->status ==0) selected @endif  value="0"> inactive </option>

                            </select>
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
    <script>
        $(document).ready(function (){
            $('.image-preview').css({
                'background-image':'url({{asset($chef->image)}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>
@endpush


