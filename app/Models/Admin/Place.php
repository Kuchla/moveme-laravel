<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Place extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'description', 'city', 'location', 'visitation', 'image'
    ];
}

