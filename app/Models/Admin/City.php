<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'about'
    ];
}
