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
        'partici_number'
    ];
}
