<?php

namespace App\Models\Course;

use App\Models\Course\Category\RefSubCategory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'ref_sub_categories_id',
        'user_id',
        'price_id',
        'level_id',
        'title',
        'sub_title',
        'description',
        'total_ratings',
        'status',
        'progress',
        'thumbnail',
        'summary',
        'certificate',
        'slug',
        'feedback'
    ];

    public function thumbnail()
    {
        if (!$this->thumbnail) {
            return asset('assets/images/placeholder/placeholder-4by3.svg');
        }

        return $this->thumbnail;
    }

    // course to user/instructor
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // course to course_section
    public function course_section()
    {
        return $this->hasMany(CourseSection::class, 'course_id');
    }

    public function ref_sub_category()
    {
        return $this->belongsTo(RefSubCategory::class, 'ref_sub_categories_id');
    }

    // course to course_requirement
    public function course_requirement()
    {
        return $this->hasMany(CourseRequirement::class, 'course_id');
    }

    // course to course_topic
    public function course_topic()
    {
        return $this->hasMany(CourseTopic::class, 'course_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id');
    }

    public function reviews()
    {
        return $this->hasMany(CourseReview::class);
    }

    public function comments()
    {
        return $this->hasMany(CourseComment::class)->whereNull('parent_id');
    }

    public function level()
    {
        return $this->belongsTo(RefCourseLevel::class, 'level_id');
    }
}
