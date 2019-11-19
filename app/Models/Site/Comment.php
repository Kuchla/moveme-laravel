<?php

namespace App\Models\Site;

use App\Models\Admin\Event;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $fillable = [
        'text', 'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
