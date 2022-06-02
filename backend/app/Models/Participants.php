<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'allergy',
        'tel',
        'prefecture',
        'attendance',
        'other_allergy',
        'guest_type'
    ];

    // public function how_to_watch()
    // {
    //     return $this->belongsTo('App\Models\HowToWatch');
    // }
    
}
