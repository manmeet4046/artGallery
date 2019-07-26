<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
protected $fillable = array(
        'name',
        'comment',
        'user_id'
    );
   
}
