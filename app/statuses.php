<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    protected $casts = [
        'id' => 'string',
    ];
}
