<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'image', 'user_id'
    ];

    public function setImageActivityAttribute($image)
    {
        $this->attributes['image'] = is_null($image) ? $this->image : $image;
    }

}
