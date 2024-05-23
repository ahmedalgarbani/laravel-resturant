@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Counter Create</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.counter.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}
                    <div class="col-6">
                        <label>background image</label>
                        <div id="image-preview-2" class="image-preview" >
                            <label for="image-upload-2" id="image-label">Choose File</label>
                            <input type="file" name="background" id="image-upload-2" >
                            <input type="hidden" name="old_background" value="{{@$counter->background}}">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="row mb-5" >
                        <div class="col-6">
                                <div class="col-sm-6 col-md-7">
                                    <label >icon (1)</label>
                                    <br>
                                    <button class="btn btn-primary" data-icon="{{@$counter->counter_icon_one}}" name="counter_icon_one" role="iconpicker"></button>
                                </div>
                            </div>

                        </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="counter_name_one"
                                   type="text" value="{{@$counter->counter_name_one}}">
                        </div>

                        <div class="col">
                            <label>count </label>
                            <input class="form-control" name="counter_count_one"
                                   type="text" value="{{@$counter->counter_count_one}}">
                        </div>
                    </div>



                    <br>
                    <hr>
                    <h5>Counter 2</h5>

                    <br>
                    <div class="row mb-5" >
                        <div class="col-6">
                            <div class="col-sm-6 col-md-7">
                                <label >icon (2)</label>
                                <br>
                                <button class="btn btn-primary" data-icon="{{@$counter->counter_icon_two}}" name="counter_icon_two" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="counter_name_two"
                                   type="text" value="{{@$counter->counter_name_two}}">
                        </div>

                        <div class="col">
                            <label>count </label>
                            <input class="form-control" name="counter_count_two"
                                   type="text" value="{{@$counter->counter_count_two}}">
                        </div>
                    </div>



                    <br>
                    <br>
                    <hr>
                    <h5>counter 3</h5>
                    <br>
                    <div class="row mb-5" >
                        <div class="col-6">
                            <div class="col-sm-6 col-md-7">
                                <label >icon (3)</label>
                                <br>
                                <button class="btn btn-primary" data-icon="{{@$counter->counter_icon_three}}" name="counter_icon_three" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="counter_name_three"
                                   type="text" value="{{@$counter->counter_name_three}}">
                        </div>

                        <div class="col">
                            <label>count </label>
                            <input class="form-control" name="counter_count_three"
                                   type="text" value="{{@$counter->counter_count_three}}">
                        </div>
                    </div>


                    <br>
                    <hr>

                    <h5>counter 4</h5>
                    <br>
                    <div class="row mb-5" >
                        <div class="col-6">
                            <div class="col-sm-6 col-md-7">
                                <label >icon (4)</label>
                                <br>
                                <button class="btn btn-primary" data-icon="{{@$counter->counter_icon_four}}" name="counter_icon_four" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="counter_name_four"
                                   type="text" value="{{@$counter->counter_name_four}}">
                        </div>

                        <div class="col">
                            <label>count </label>
                            <input class="form-control" name="counter_count_four"
                                   type="text" value="{{@$counter->counter_count_four}}">
                        </div>
                    </div>


                    <br>
                    <hr>

                    <br>
                    <hr>
                    <br>


@can('Counter-edit')
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
    <script>
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload-2",   // Default: .image-upload
            preview_box: "#image-preview-2",  // Default: .image-preview
            label_field: "#image-label-2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });


    </script>
@endpush
