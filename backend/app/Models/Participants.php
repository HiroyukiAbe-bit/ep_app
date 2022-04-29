<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'line_id',
        'how_to_watch_id'
    ];

    public function how_to_watch()
    {
        return $this->belongsTo('App\Models\HowToWatch');
    }
    
}
