<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usr';

    protected $fillable = ['email', 'auth_uid'];

    protected $hidden = ['remember_token'];
    public function user_meta()
    {
        return $this->hasOne('App\Models\UserMeta', 'object_id', 'id');
    }
    public function getAuthPassword()
    {
        return $this->user_meta?->value;
    }
}
