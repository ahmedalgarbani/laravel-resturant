@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Subscriber</h1>
        </div>
        <div class="card card-primary">
            <div class="card">
                <div class="card-header">

                    <h4>Subscribers Email</h4>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                <h4>Send Custom Message</h4>
                            </div>
                            @can('News Letter Send Message-list')
                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                                <form method="POST" action="{{route('admin.SendMessage.newsletter')}}">
                                    @csrf
                                    @method('POST')

                                    <div class="form-group">
                                        <label>Subscribe </label>
                                        <input class="form-control " name="subject"
                                               type="text" value="{{old('subject')}}" >
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-6">Message</label>
                                        <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="message" style="display: none;">

                                </textarea>
                                        </div>
                                    </div>
                                    <div class="mt-5 d-flex justify-content-center">
                                        @can('News Letter Send Message-send')
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body myTable">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    </div>

    </div>

@endsection

@push('scripts')
    <script>



        let table = new DataTable('#myTable');
        oTable = $("#bigtable").dataTable({
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        });

    </script>
    {{$dataTable->scripts(attributes:['type'=>'module']) }}

@endpush
