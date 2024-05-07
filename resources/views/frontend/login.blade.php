@extends('welcome')
@section('content')
    <div class="user-login">
        <div class="container">
            <div class="row">
                <div class="midone">

                    <div class="col-lg-12 colmd-6 col-12">
                        <form action="{{ url('loginnormaluser') }}" method="POST" class="row g-3">
                            @csrf
                            
                           
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-6">
                                <label for="inputpassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Enter Password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
