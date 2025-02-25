<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionPresences extends Model
{
    protected $fillable = [
        'activity_id',
        'user_id',
        'is_present'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
