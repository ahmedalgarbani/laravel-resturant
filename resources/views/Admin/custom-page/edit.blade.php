@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Custom Page Edit [ {{$page->name}} ]</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.custom-page.update',$page->id) }}" method="post"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}


                    <div class="row">



                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text" value="{{$page->name}}"  >
                        </div>

                    </div>

                    <br>
                    <hr>

                    {{-- 2 --}}
                    <div class="row">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-6">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="customcontent" style="display: none;">
                                    {{$page->content}}
                                </textarea>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputName" class="control-label">Status</label>
                        <select name="status" class="form-control SlectBox"  >
                            <option @if($page->status == 1 ) selected @endif value="1"> active</option>
                            <option @if($page->status == 0 ) selected @endif value="0"> inactive </option>

                        </select>
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
