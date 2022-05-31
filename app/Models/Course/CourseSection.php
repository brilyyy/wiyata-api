<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $table = 'course_section';

    protected $fillable = [
        'course_id',
        'section_name'
    ];

    // course_section to course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // course_section to course_lecture
    public function course_lecture()
    {
        return $this->hasMany(CourseLecture::class, 'course_section_id');
    }
}
