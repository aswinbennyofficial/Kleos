<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];

    public function agents()
    {
        return $this->belongsToMany(AgentProfile::class, 'agent_skill');
    }

    public function jobs()
    {
        return $this->belongsToMany(JobPost::class, 'job_skill');
    }
}
