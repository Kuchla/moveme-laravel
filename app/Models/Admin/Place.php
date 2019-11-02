<?php

namespace App\Models\Admin;

use App\Models\Site\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Place extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'city_id', 'location', 'visitation', 'image'
    ];

    public function setPlaceImageAttribute($image)
    {
        $this->attributes['image'] = is_null($image) ? $this->image : $image;
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_place');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

