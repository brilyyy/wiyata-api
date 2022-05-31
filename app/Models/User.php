<?php

namespace App\Models;

use App\Models\Chat\ChatMessage;
use App\Models\Chat\ChatRoom;
use App\Models\Chat\UserInRoom;
use App\Models\Course\Course;
use App\Models\Student\Wishlist;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'balance',
        'status_withdraw',
        'bank_id',
        'bio',
        'bank_account',
        'google_id',
        'email_verified_at',
        'city_id',
        'address',
        'phone',
        'birthday',
        'nik',
        'scan_ktp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function email_verify_token()
    {
        return $this->hasOne(EmailVerifyToken::class);
    }
    public function instructor_educations()
    {
        return $this->hasMany(InstructorEducation::class);
    }
    public function instructor_jobs()
    {
        return $this->hasMany(InstructorJob::class);
    }
    public function instructor_skills()
    {
        return $this->hasMany(InstructorSkill::class);
    }
    public function admin_notifications()
    {
        return $this->hasMany(AdminNotification::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function instructor_joined_logs()
    {
        return $this->hasMany(InstructorJoinedLog::class);
    }

    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class, 'sender_id');
    }

    public function chat_room()
    {
        return $this->hasMany(ChatRoom::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
