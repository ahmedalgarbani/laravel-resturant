@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}

                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview" >
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file"  name="image" id="image-upload" >
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>name </label>
                            <input class="form-control" value="{{old('name')}}" name="name"
                                   type="text" >
                        </div>


                        <div class="col">
                            <label>price </label>
                            <input class="form-control " value="{{old('price')}}" name="price"
                                   type="text"  >
                        </div>
                        <div class="col">
                            <label>offer price </label>
                            <input class="form-control " value="{{old('offer_price')}}" name="offer_price"
                                   type="text"  >
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label> quantity </label>
                            <input class="form-control " value="{{old('quantity')}}" name="quantity"
                                   type="text"  >
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label"> category</label>
                            <select name="category"  class="form-control SlectBox"  >
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">long description</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="long_description" style="display: none;">
                                    {{old('long_description')}}
                                </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>short description </label>
                            <input class="form-control " value="{{old('short_description')}}" name="short_description"
                                   type="text"  >
                        </div>
                    </div>
                    {{-- 2 --}}
                    <div class="row">
                        <div class="col">
                            <label>seo title </label>
                            <input class="form-control " value="{{old('seo_title')}}" name="seo_title"
                                   type="text"  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>seo description </label>
                            <input class="form-control " value="{{old('seo_description')}}" name="seo_description"
                                   type="text"  >
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <label>sku </label>
                            <input class="form-control " value="{{old('sku')}}" name="sku"
                                   type="text"  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label"> status</label>
                            <select name="status"  class="form-control SlectBox"  >
                                <option value="1"> active</option>
                                <option value="0"> inactive </option>

                            </select>
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label"> show at home</label>
                            <select name="show_at_home" class="form-control SlectBox"  >
                                <option value="1"> yes</option>
                                <option value="0"> no </option>

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
