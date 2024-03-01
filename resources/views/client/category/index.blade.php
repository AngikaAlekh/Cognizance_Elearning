@extends('layouts.client.master')

@section('content')
<section class="section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($category->courses as $course)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('uploads/course/' . $course->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text"></p>
                            <a href="{{url('/course/'.$course->slug)}}" class="btn btn-primary">Browse</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection