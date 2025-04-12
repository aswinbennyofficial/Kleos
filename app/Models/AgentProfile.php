<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    protected $fillable = ['user_id', 'phone', 'yoe', 'category', 'country', 'resume_url', 'is_available'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'agent_skill');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'agent_id');
    }
}
