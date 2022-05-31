<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRequirement extends Model
{
    use HasFactory;

    protected $table = 'course_requiremenets';

    protected $fillable = [
        'course_id',
        'name'
    ];
}
