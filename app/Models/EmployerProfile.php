<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'company_name',
        'company_phone',
        'website',
        'since',
        'team_size',
        'address',
        'city_id',
        'status',
        'biography'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getLogoAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('assets/images/default-user.jpg');
        }
    }
}
