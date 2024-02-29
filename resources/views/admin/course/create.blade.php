@extends('layouts.admin.master')

@section('title', 'Create Course - Elearning')

@section('custom_styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Course</h1>
    <a href="{{url('/admin/courses/')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> View All Courses</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('/admin/course/create')}}" method="post" class="card shadow rounded p-3" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Web</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Course Title</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="mb-3">
                    <label for="">Short Description</label>
                    <input class="form-control" type="text" name="description">
                </div>
                <div class="mb-3">
                    <label for="">Long Description</label>
                    <textarea name="long_description" id="course_summernote" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Video URL</label>
                    <input class="form-control" type="text" name="video">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input class="form-control" type="text" name="slug">
                </div>
                <div class="mb-3">
                    <label for="">Course Thumbnail</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="mb-3">
                    <label for="">Meta Course Title</label>
                    <input class="form-control" type="text" name="meta_title">
                </div>
                <div class="mb-3">
                    <label for="">Meta Course Description</label>
                    <input class="form-control" type="text" name="meta_description">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#course_summernote').summernote({
            height: 250
        });
    });
</script>
@endsection