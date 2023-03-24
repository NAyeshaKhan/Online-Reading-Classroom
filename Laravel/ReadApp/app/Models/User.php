<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Events\UserCreated;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static function boot(){
        parent::boot();
        static::created( function($user){
            $user->profilePic()->create([
                'profile_picture'=>'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png',
            ]);
            //When user is created, a default image is uploaded as the Profile picture
        });
    }

    public function profilePic(){
        return $this->hasOne(ProfilePic::class,'student_id');
    }//1 student has only one Profile picture

    public function courses(){
        return $this->belongsToMany(Course::class,'course_user')->withPivot('course_id')->withTimestamps();
    }//A teacher can have many courses

    public function lessons(){
        return $this->belongsToMany(Course::class,'course_student')->withPivot('course_id')->withTimestamps();
    }//A student can be enrolled in many courses
}
