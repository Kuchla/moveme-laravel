<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'image'
    ];

    public function setImageActivityAttribute($image)
    {
        $this->attributes['image'] = is_null($image) ? $this->image : $image;
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'activity_place');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
