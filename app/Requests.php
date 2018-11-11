<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'name', 'phone', 'lat', 'lon', 'location', 'district', 'reqOthers', 'other', 'rescue', 'water', 'food', 'clothing', 'medicine', 'kitchen', 'toiletries', 'status'
    ];

    protected $hidden = [];
}
