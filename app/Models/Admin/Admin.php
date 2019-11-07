<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'is_manager',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setAdminPasswordAttribute($value)
    {
        $this->attributes['password'] = is_null($value) ? $this->password :  $value;
    }

    // public function setAdminEmailAttribute($value)
    // {
    //     $this->attributes['email'] = $value != $this->email ? $this->email;
    // }
}
