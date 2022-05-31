<?php

namespace App\Models\Course;

use App\Http\Controllers\Instructor\Course\CourseController;
use App\Models\Student\StudentProgress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecture extends Model
{
    use HasFactory;

    protected $table = 'course_lecture';

    protected $fillable = [
        'course_section_id',
        'lecture_name',
        'description',
        'video',
        'video_name',
        'duration',
        'is_preview',
        'feedback',
        'status'
    ];


    // course_lecture to course_section
    public function course_section()
    {
        return $this->belongsTo(CourseSection::class, 'course_section_id');
    }

    // course_lecture to course_content
    public function course_content()
    {
        return $this->hasMany(CourseContent::class, 'course_lecture_id');
    }

    public function student_progresses()
    {
        return $this->hasMany(StudentProgress::class, 'course_lecture_id');
    }
}
