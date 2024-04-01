@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.slider.update',$slider->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" value="{{$slider->image}}" id="image-upload" >
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>offer </label>
                            <input class="form-control" name="offer"
                                   type="text" value="{{$slider->offer}}" >
                        </div>


                        <div class="col">
                            <label>title </label>
                            <input class="form-control " name="title"
                                   type="text" value="{{$slider->title}}" >
                        </div>

                    </div>

                    {{-- 2 --}}
                    <div class="row">
                        <div class="col">
                            <label>sub_title </label>
                            <input class="form-control " name="sub_title"
                                   type="text" value="{{$slider->sub_title}}" >
                        </div>

                        <div class="col">
                            <label>short_description </label>
                            <textarea class="form-control " name="short_description"
                                   type="text" value="" >
                                {{$slider->short_description}}
                            </textarea>
                        </div>


                        <div class="col">
                            <label>button link </label>
                            <input class="form-control " name="button_link"
                                   type="text" value="{{$slider->button_link}}" >
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">button link status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option @if($slider->status ==1) selected @endif value="1"> active</option>
                                <option @if($slider->status ==0) selected @endif value="0"> inactive</option>

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
                'background-image':'url({{asset($slider->image)}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>
@endpush

