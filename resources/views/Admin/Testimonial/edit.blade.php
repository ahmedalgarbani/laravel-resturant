@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Testimonial Edit</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.Testimonial.update',$Testimonial->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <label>Testimonial image</label>
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                                <input type="hidden" name="old_image" value="{{$Testimonial->image}}" >
                                <input type="hidden" name="Testimonial_id" value="{{$Testimonial->id}}" >
                            </div>
                        </div>

                    </div>
                    <div class="row">



                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text" value="{{$Testimonial->name}}" >
                        </div>

                        <div class="col">
                            <label>Title </label>
                            <input class="form-control" name="title"
                                   type="text" value="{{$Testimonial->title}}" >
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Rating</label>
                        <select name="rating" class="form-control SlectBox" >
                            <option @if($Testimonial->rating == 1) selected @endif value="1">1</option>
                            <option @if($Testimonial->rating == 2) selected @endif value="2">2</option>
                            <option @if($Testimonial->rating == 3) selected @endif value="3">3</option>
                            <option @if($Testimonial->rating == 4) selected @endif value="4">4</option>
                            <option @if($Testimonial->rating == 5) selected @endif value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ReView </label>
                        <input class="form-control " name="review"
                               type="text" value="{{$Testimonial->review}}" >
                    </div>


                    {{-- 2 --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="inputName" class="control-label">Show at home</label>
                            <select name="show_at_home" class="form-control SlectBox"  >
                                <option @if($Testimonial->show_at_home == 1) selected @endif value="1"> Yes </option>
                                <option @if($Testimonial->show_at_home == 0) selected @endif value="0"> No </option>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="inputName" class="control-label">status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option @if($Testimonial->status == 1) selected @endif value="1"> active</option>
                                <option @if($Testimonial->status == 0) selected @endif value="0"> inactive </option>

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
                'background-image':'url({{asset($Testimonial->image)}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>
@endpush
