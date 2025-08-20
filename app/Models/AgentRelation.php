<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRelation extends Model
{
    use HasFactory;
    protected $table = 'agent_relation';
    protected $guarded = [];
    public $timestamps = false;
    public function agent()
    {
        return $this->belongsTo('App\models\Agent', 'object_id');
    }
}
