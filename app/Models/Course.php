<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Enrollment;

class Course extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    } 
}