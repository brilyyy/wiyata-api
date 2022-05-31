<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefCourseLevel extends Model
{
    use HasFactory;

    protected $table = 'ref_course_level';

    protected $fillable = ['name'];
}
