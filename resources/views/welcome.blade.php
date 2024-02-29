@extends('layouts.client.master')

@section('title', 'ELearning')

@section('content')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                    <h6 class="text-center">platform for creatives around the world</h6>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">

                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <div class="container py-5">
        <div class="row">
            @php
                $featured_categories = App\Models\FeaturedCategory::all();
            @endphp

            @foreach ($featured_categories as $fcat)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('uploads/category/' . $fcat->category->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $fcat->category->title }}</h5>
                            <p class="card-text"></p>
                            <a href="{{url('/category/'.$fcat->category->slug)}}" class="btn btn-primary">Browse</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection