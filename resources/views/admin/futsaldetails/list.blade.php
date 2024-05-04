@extends('admin.include.main')
@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Dashboard</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Table starts -->
                    <div class="card">
                       
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Thumbnail</th>
                                                <th>Pan Vat Docs</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->description}}</td>
                                                <td><img height="100px;" width="100px;" src="{{$item->thumbnail}}" /></td>
                                                <td><img height="100px;" width="100px;" src="{{$item->pan_vatdocs}}" /></td>
                                                <td>{{$item->status}}</td>
                                            </tr>
                                           @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Main content ends -->
        <!-- Container-fluid ends -->
        
    </div>
@endsection
