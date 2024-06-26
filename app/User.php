<?php

namespace App;

use App\Models\Admin\Activity;
use App\Models\Site\Comment;
use App\Models\Site\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_user');
    }

    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function setUserPasswordAttribute($value)
    {
        $this->attributes['password'] = is_null($value) ? $this->password :  $value;
    }
}
