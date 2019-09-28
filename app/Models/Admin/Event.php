<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'place_id', 'is_free', 'is_limited', 'image', 'date'
    ];

    public function setEventImageAttribute($image)
    {
        $this->attributes['image'] = is_null($image) ? $this->image : $image;
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_place');
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
