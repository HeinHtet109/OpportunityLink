<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'active_job_id',
        'user_id',
        'message',
        'status'
    ];

    public function activeJob()
    {
        return $this->belongsTo(ActiveJob::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
