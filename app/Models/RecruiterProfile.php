<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruiterProfile extends Model
{
    protected $fillable = ['user_id', 'company_name', 'contact_number', 'industry', 'country'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'recruiter_id');
    }
}
