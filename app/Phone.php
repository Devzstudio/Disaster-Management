<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'location', 'name', 'number', 'position'
    ];

    protected $hidden = [];
}
