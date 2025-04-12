<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = ['recruiter_id', 'title', 'description', 'category', 'location'];

    public function recruiter()
    {
        return $this->belongsTo(RecruiterProfile::class, 'recruiter_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skill');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}
