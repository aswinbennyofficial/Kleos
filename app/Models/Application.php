<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    protected $fillable = ['agent_id', 'job_id', 'status'];

    public function agent()
    {
        // return $this->belongsTo(AgentProfile::class, 'agent_id');
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function agentProfile()
    {
        return $this->agent->agentProfile();
    }


    // public function job()
    // {
    //     return $this->belongsTo(JobPost::class, 'job_id');
    // }

    public function job()
    {
        return $this->belongsTo(JobPost::class);
    }
}
