<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_photo',
        'job_title',
        'age',
        'gender',
        'experience_level',
        'education_level',
        'languages',
        'current_salary',
        'expected_salary',
        'address',
        'city_id',
        'status',
        'biography'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getProfilePhotoAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('assets/images/default-user.jpg');
        }
    }
}
