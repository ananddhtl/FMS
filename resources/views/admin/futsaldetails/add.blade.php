@extends('admin.include.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Add Futsal Details</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Table starts -->
                    <div class="card">



                        <div class="card-block">
                            <form action="{{ route('storefutsaldetails') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Title">

                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea" class="form-control-label">Description</label>
                                    <textarea name="description" class="form-control" id="exampleTextarea" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Thumbnail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Pan Vat Docs</label>
                                    <input type="file" name="pan_vat_docs" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Thumbnail">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Enter the time slots</label>
                                    <div class="tags_add">
                                        <input
                                            class="" type="text" value=""
                                            data-role="tagsinput" style="display: none;">
                                    </div>
                                </div> --}}


                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
