<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'perfil', 'und_gestor'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasAnyRole($roles){
        return null !== $this->roles()->where('name', $roles)->first();
    }
    
}
