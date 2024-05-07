@extends('welcome')
@section('content')
    <section class="search-bar">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-10 col-12">
                    <form class="search-form">
                        <input placeholder="Search Futsal" type="text">
                        <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div> <!-- col-lg-6 col-md-6 col-12 -->

                <div class="col-lg-3 col-md-2 col-12">

                    <select class="form-select" aria-label="Default select example" style="display: none;">
                        <option selected="">Location</option>
                        <option value="1">Pokhara</option>
                        <option value="2">Kathmandu</option>

                    </select>
                    <div class="nice-select form-select" tabindex="0"><span class="current">Location</span>
                        <ul class="list">
                            <li data-value="Location" class="option selected">Location</li>
                            <li data-value="1" class="option">Pokhara</li>
                            <li data-value="2" class="option">Kathmandu</li>
                        </ul>
                    </div>

                </div> <!-- col-lg-6 col-md-6 col-12 -->


            </div> <!-- row -->

        </div> <!-- container -->
    </section>
    <section class="Futsal">
        <div class="container">
            @foreach($data as $item)
            <div class="futsal-post">
                <div class="row g-0 bg-body-secondary position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <div class="left-image">
                            <img src="{{$item->thumbnail}}" class="w-100" alt="...">
                        </div> <!-- left-image -->
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">
                        <h5 class="mt-0">{{$item->title}}</h5>
                        <p style="line-height: 35px;"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            Nayabazar-9, Pokhara</p>
                        <div class="rate">
                            <span class="fa fa-star checked" aria-hidden="true"></span>
                            <span class="fa fa-star checked" aria-hidden="true"></span>
                            <span class="fa fa-star checked" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                        </div>

                        <div class="price">
                            <p>Rs. 1450/hr</p>
                        </div>
                        <a href="{{ route('getfutsaldetailspage', ['id' => $item->id]) }}" class="btn">Futsal Description</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
