<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class JobCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'icon'
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

    public function getIconAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('assets/images/default-user.jpg');
        }
    }

    public function jobs()
    {
        return $this->hasMany(JobListing::class, 'job_category_id', 'id');
    }
}
