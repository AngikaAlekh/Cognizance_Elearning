<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function enrollment($course_id){
        $new_enrollment = new Enrollment;
        $new_enrollment->course_id = $course_id;
        $new_enrollment->user_id = Auth::user()->id;
        $new_enrollment->save();
        return redirect('/profile');
    }
}
