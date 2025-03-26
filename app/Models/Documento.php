<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participante;

class Documento extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps = false;
    protected $primarykey = 'participante_id';
    public function participante(){
        return $this->belongsTo('App\models\Participante');
    }
}
