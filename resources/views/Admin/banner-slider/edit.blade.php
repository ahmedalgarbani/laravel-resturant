@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Banner Slider Create</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.banner-slider.update',$bannerSlider->id) }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <label>banner image</label>
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" >
                                <input type="hidden" name="old_image" value="{{$bannerSlider->image}}"  >
                            </div>
                        </div>
                        <input type="hidden" value="{{$bannerSlider->id}}" name="bannerSlider_id">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Title </label>
                            <input class="form-control" name="title"
                                   type="text" value="{{$bannerSlider->title}}" >
                        </div>


                        <div class="col">
                            <label>Sub Title </label>
                            <input class="form-control " name="sub_title"
                                   type="text"  value="{{$bannerSlider->sub_title}}">
                        </div>

                    </div>

                    {{-- 2 --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="inputName" class="control-label">status</label>
                            <select name="status" class="form-control SlectBox"  >
                                <option @if($bannerSlider->status == 1) selected @endif value="1"> active</option>
                                <option @if($bannerSlider->status == 0) selected @endif  value="0"> inactive </option>

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


@endpush

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.image-preview').css({
                'background-image':'url({{asset($bannerSlider->image)}})',
                'background-size':'cover',
                'background-position':'center center'
            })
        })


    </script>
@endpush

