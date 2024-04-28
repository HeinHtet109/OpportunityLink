<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'type',
        'slug',
        'route'
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'slug', 'slug');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'slug', 'slug');
    }

    public function faq()
    {
        return $this->belongsTo(Faq::class, 'slug', 'slug');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'slug', 'slug');
    }
}
