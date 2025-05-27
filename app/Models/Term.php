<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table = 'term';
    protected $guarded =[];
    public $timestamps = false;
    public function agent(){
        return $this->belongsToMany('App\models\Agent', 'term_relation', 'term_id', 'object_id');
    }
}
