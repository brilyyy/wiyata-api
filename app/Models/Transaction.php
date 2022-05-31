<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course\Course;
use App\Models\Student\StudentProgress;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instructor_id',
        'course_id',
        'reference',
        'merchant_ref',
        'payment_method',
        'transaction_fee',
        'price_course',
        'total_amount',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function student_progresses()
    {
        return $this->hasMany(StudentProgress::class);
    }
}
