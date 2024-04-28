<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'freelancer_id',
        'employer_id',
        'start_at',
        'end_at',
        'freelancer_end',
        'employer_end',
        'status'
    ];

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id', 'id');
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }

    public function job()
    {
        return $this->hasOne(JobListing::class, 'id', 'job_id');
    }

    public function jobActivityLog()
    {
        return $this->hasMany(JobActivityLog::class);
    }
}
