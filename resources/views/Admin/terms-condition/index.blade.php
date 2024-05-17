@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Terms Condition</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.termsCondition.store') }}" method="post"
                      autocomplete="off">
                    @method('POST')
                    @csrf
                    {{-- 1 --}}
                    <div class="row">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-6">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="description" style="display: none;">
                                    {{$terms->content}}
                                </textarea>
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
