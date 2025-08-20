<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agent';
    protected $guarded = [];
    public function agent_meta()
    {
        return $this->hasMany('App\Models\AgentMeta', 'object_id');
    }
    public function agent_relation()
    {
        return $this->hasMany('App\Models\AgentRelation', 'agent_id');
    }
    public function file()
    {
        return $this->hasMany('App\Models\File', 'object_id');
    }
    public function term()
    {
        return $this->belongsToMany('App\Models\Term', 'term_relation', 'object_id', 'term_id');
    }
}
