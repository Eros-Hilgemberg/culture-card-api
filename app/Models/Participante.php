<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function contato()
    {
        return $this->hasOne('App\Models\Contato');
    }
    public function endereço()
    {
        return $this->hasOne('App\Models\Endereço');
    }
    public function documento()
    {
        return $this->hasOne('App\Models\Documento');
    }
    public function grupos()
    {
        return $this->belongsToMany('App\Models\Grupo');
    }
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
    public function editals()
    {
        return $this->belongsToMany('App\Models\Edital');
    }
}
