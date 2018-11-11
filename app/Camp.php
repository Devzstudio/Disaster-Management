<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    protected $fillable = [
        'name', 'location', 'district', 'map', 'address', 'contact', 'total'
    ];

    protected $hidden = [];
}
