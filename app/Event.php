<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   protected $fillable = ['title','description','speakers','attendees','date','event_photo','flag',]; 

   //
   public function setDateAttribute( $value ) {
  $this->attributes['date'] = (new Carbon($value))->format('Y-m-d H:i:s');
}
//protected $dates = ['date'];

  public function scopePast($query){

  	return $query->where('flag','Past');
  }
  public function scopeUpcoming($query){

  	return $query->where('flag','Upcoming');
  }
    public function scopeOngoing($query){

  	return $query->where('flag','Ongoing');
  }
}
