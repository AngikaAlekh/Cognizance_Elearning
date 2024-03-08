<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view("admin.course.index", compact('courses'));
    }
    public function create(){
        $categories = Category::all();
        return view("admin.course.create", compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'slug' => 'required|unique:courses',
        ]);

        $course = new Course;
        $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->long_description = $request->long_description;
        $course->video = $request->video;
        $course->slug = Str::slug($request->slug);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/course/', $filename);
            $course->image = $filename;
        }

        $course->meta_title = $request->meta_title;
        $course->meta_description = $request->meta_description;
        $course->price = $request->price;
        $course->save();
        return redirect('/admin/courses')->with('success', 'Course created successfully');
    }
    public function edit($id){
        $course = Course::find($id);
        $categories = Category::all();
        return view("admin.course.edit", compact('course', 'categories'));
    }
    public function update(Request $request, $id){
        $course = Course::find($id);
        if($course){
            $course->category_id = $request->category_id;
            $course->title = $request->title;
            $course->description = $request->description;
            $course->long_description = $request->long_description;
            $course->video = $request->video;
            $course->slug = Str::slug($request->slug);
    
            if($request->hasfile('image')){
                $destination = 'uploads/course/'.$course->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
    
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/course/', $filename);
                $course->image = $filename;
            }
    
            $course->meta_title = $request->meta_title;
            $course->meta_description = $request->meta_description;
            $course->price = $request->price;
            $course->update();
            return redirect('/admin/courses')->with('success', 'Course created successfully');
        }
        else{
            return redirect('/admin/courses')->with('error', 'Course not found!');
        }
        
    }
    public function destroy($id){
        $course = Course::find($id);
        if($course){
            $destination = 'uploads/course/'.$course->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $course->delete();
            return redirect('/admin/courses')->with('success', 'Course deleted successfully');
        }
        else{
            return redirect('/admin/courses')->with('error', 'Course not found!');
        }
    }
}