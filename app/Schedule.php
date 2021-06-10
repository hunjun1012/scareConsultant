<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'id', 
        'team', 
        'onwork', 
        'offwork', 
        'startlunch', 
        'endlunch',
        'starttime',
        'endtime',   
        'description', 
     ];
}
