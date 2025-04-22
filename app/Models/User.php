<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function agentProfile()
    {
        return $this->hasOne(AgentProfile::class);
    }

    

    public function recruiterProfile()
    {
        return $this->hasOne(RecruiterProfile::class);
    }

    public function isRecruiter()
    {
        return $this->role === 'recruiter';
    }

    // public function jobPosts()
    // {
    //     return $this->hasMany(JobPost::class, 'recruiter_id');
    // }

}
