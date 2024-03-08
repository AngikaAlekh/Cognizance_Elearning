@extends('layouts.client.master')

@section('title', 'Profile - ELearning')

@section('content')
    <section class="section-padding section-bg">
        <div class="container py-5">
            <div class="row card rounded p-3 mb-5">
                <h1 class="text-center">{{Auth::user()->name}}</h1>
                <h3 class="text-center">{{Auth::user()->email}}</h3>
            </div>
            <div class="row">
                <h3>Enrolled Courses</h3>
                <div class="col-md-12 p-3">
                    @foreach ($enrolled_courses as $item)
                        <div class="card d-flex flex-row justify-content-between mb-3 p-3">
                            <h4>{{$item->title}}</h4>
                            <a href="{{url('')}}" class="btn btn-primary">Continue Learning</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection