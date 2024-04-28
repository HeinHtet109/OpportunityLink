<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo',
        'name',
        'phone',
        'slug',
        'email',
        'password',
        'role'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isFreelancer()
    {
        return $this->role == FREELANCER ? true : false;
    }

    public function isEmployer()
    {
        return $this->role == EMPLOYER ? true : false;
    }

    public function getPhotoAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('assets/images/default-user.jpg');
        }
    }

    public function freelancerProfile()
    {
        return $this->hasOne(FreelancerProfile::class);
    }

    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function activeJobs()
    {
        return $this->hasMany(ActiveJob::class);
    }

    public function jobActivityLogs()
    {
        return $this->hasMany(JobActivityLog::class);
    }

    public function JobListings()
    {
        return $this->hasMany(JobListing::class);
    }

    public function ratings()
    {
        if($this->isFreelancer()) {
            return $this->hasMany(Rating::class, 'freelancer_id' , 'id')->where('type', EMPLOYER);
        }else{
            return $this->hasMany(Rating::class, 'employer_id', 'id')->where('type', FREELANCER);
        }
    }
}
