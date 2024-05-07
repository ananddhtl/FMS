@extends('welcome')
@section('content')
    <?php
    $user = \DB::table('normal_users')->select('id', 'name')->where('password', session()->get('sessionUser'))->get();
    $id = $user[0]->id;
    ?>
    <section class="Futsal">
        <div class="container">

            <div class="futsal-post">
                <div class="row g-0 bg-body-secondary position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <div class="left-image">
                            <img src="{{ $data->thumbnail }}" class="w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">
                        <h5 class="mt-0">{{ $data->title }}</h5>
                        <p style="line-height: 35px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Nayabazar-9,
                            Pokhara</p>
                        <div class="price">
                            <p>Rs. 1450/hr</p>
                        </div>
                        <form action="{{ url('bookfutsals') }}" method="POST">
                            @csrf
                            <input type="hidden" name="futsal_id" value="{{ $data->id }}" />
                            <input type="hidden" name="user_id" value="{{ @$user[0]->id }}" />
                            <div class="time-slots">
                                @foreach (explode(',', $data->timeslots) as $timeSlot)
                                    <div class="form-check">

                                        <input class="form-check-input" name="time_slot" type="checkbox"
                                            value="{{ $timeSlot }}" id="timeSlot{{ $loop->index }}">
                                        <label class="form-check-label" for="timeSlot{{ $loop->index }}">
                                            {{ $timeSlot }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn">Book Futsal</button>
                        </form>
                        <!-- Explode and display time slots with checkboxes -->

                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
