<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMeta extends Model
{
    use HasFactory;
    protected $table = 'agent_meta';
    protected $guarded =[];
    public $timestamps = false;
    public function agent(){
        return $this->belongsTo('App\models\Agent', 'object_id');
    }
}
