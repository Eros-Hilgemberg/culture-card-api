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
        return $this->hasMany('App\Models\AgentMeta' ,'object_id');
    }
    public function file()
    {
        return $this->hasMany('App\Models\File' ,'object_id');
    }
}
