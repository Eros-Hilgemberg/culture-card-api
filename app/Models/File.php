<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'file';
    protected $guarded =[];
    public $timestamps = false;
    protected $primarykey = 'participante_id';
    public function file(){
        return $this->belongsTo('App\models\Agent', 'object_id');
    }
}
