@extends('admin.include.main')
@section('content')
    
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Add Futsal Available Time Slots</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Table starts -->
                    <div class="card">



                        <div class="card-block">
                            <form action="{{ route('storefutsaltimeslots') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Date</label>
                                    <input type="date" name="title" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Title">

                                </div>

                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Enter the time slots</label>
                                    <div class="tags_add">
                                        <input
                                            class="" type="text" value=""
                                            data-role="tagsinput" style="display: none;">
                                    </div>
                                </div>


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
