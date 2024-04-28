<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class JobListing extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'job_category_id',
        'expired_at',
        'offer_salary',
        'experience_level',
        'location',
        'status'
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
                'source' => 'title'
            ]
        ];
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }

    public function activeJob()
    {
        return $this->hasOne(ActiveJob::class, 'id', 'job_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'job_id', 'id');
    }

    public function wishList()
    {
        return $this->hasMany(WishList::class, 'job_id', 'id');
    }
}
