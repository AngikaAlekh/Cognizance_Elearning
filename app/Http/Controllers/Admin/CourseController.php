<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view("");
    }
    public function create(){
        return view("admin.course.create");
    }
    public function store(){
    }
    public function edit($id){
        return view("");
    }
    public function update($id){
    }
    public function destroy($id){
    }
}