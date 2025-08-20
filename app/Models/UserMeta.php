<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $table = 'user_meta';

    protected $fillable = ['object_id', 'value'];

    public $timestamps = false;

    public function usr()
    {
        return $this->belongsTo('App\models\User', 'email', 'auth_uid');
    }
}
