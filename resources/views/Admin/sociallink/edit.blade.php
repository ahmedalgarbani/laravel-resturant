@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Social Link</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body myTable">
                <form action="{{ route('admin.socail-link.update',$sociallink->id) }}" method="post"
                      autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- 1 --}}
                    <div class="row mb-5" >
                        <div class="col-6">
                            <div class="col-sm-6 col-md-7">
                                <label >icon</label>
                                <br>
                                <button class="btn btn-primary" data-icon="{{@$sociallink->icon}}" name="icon" role="iconpicker"></button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Name </label>
                            <input class="form-control " name="name"
                                   type="text" value="{{@$sociallink->name}}">
                        </div>

                        <div class="col">
                            <label>Link </label>
                            <input class="form-control" name="link"
                                   type="text" value="{{@$sociallink->link}}">
                        </div>
                    </div>



                    <br>
                    <hr>


                    <div class="col">
                        <label for="inputName" class="control-label">Link Status</label>
                        <select name="status" class="form-control SelectBox"  >
                            <option @if(@$sociallink->status ==1) selected @endif value="1"> Yes</option>
                            <option @if(@$sociallink->status ==0) selected @endif value="0"> No</option>
                        </select>
                    </div>


            <br>
            <hr>
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

