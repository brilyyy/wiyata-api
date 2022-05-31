<?php

namespace App\Models\Student;

use App\Models\Course\CourseLecture;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'course_lecture_id',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function lecture()
    {
        return $this->belongsTo(CourseLecture::class, 'course_lecture_id');
    }
}
