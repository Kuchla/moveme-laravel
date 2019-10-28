<?php

namespace App\Models\Site;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use Notifiable;

    protected $fillable = [
        'image', 'info',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setProfileImageAttribute($image)
    {
        $this->attributes['image'] = is_null($image) ? $this->image : $image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
