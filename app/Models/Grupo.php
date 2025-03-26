<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function participantes(){
        return $this->belongsToMany('App\Models\Participante');
    }
}
