<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'parent_id',
        'comment',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(CourseComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->children()->with('replies');
    }
}
