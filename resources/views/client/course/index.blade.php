@extends('layouts.client.master')

@section('title', $course->title . ' - ELearning')

@section('content')
    <section class="section-padding section-bg">
        <div class="container">
            <h1>{{$course->title}}</h1>
            <p><span class="badge bg-secondary">{{$category->title}}</span></p>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {{$course->description}}
                    </p>
                </div>
                <div class="col-md-12">
                    {!! $course->long_description !!}
                </div>
                <div class="col-md-12 mb-5">
                    <h2 class="text-danger">₹ {{$course->price}}</h2>
                </div>
                <div class="col-md-12">
                    <a href="{{url('')}}" class="btn btn-primary">Subscribe</a>
                </div>
            </div>
        </div>
    </section>
@endsection