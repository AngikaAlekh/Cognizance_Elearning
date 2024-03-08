<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\Enrollment;


class ProfileController extends Controller
{
    public function index(){
        $enrolled_courses = [];
        $enrollments = Enrollment::where('user_id', Auth::user()->id)->get();
        foreach ($enrollments as $item ) {
            $course = Course::find($item->course_id);
            array_push($enrolled_courses, $course);
        }
        return view ('client.profile.index', compact('enrolled_courses'));
    }
}