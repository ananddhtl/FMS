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
                                                <th>Date</th>
                                                
                                                <th>Time Slots</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->futsal_id}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->timeslots}}</td>
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
