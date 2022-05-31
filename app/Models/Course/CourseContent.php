<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected $table = 'course_content';

    protected $fillable = [
        'course_lecture_id',
        'type',
        'display_name',
        'resource_file',
        'resource_link'
    ];
}
