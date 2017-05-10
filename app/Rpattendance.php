<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Rpattendance extends Model
{
     protected $fillable = [
        'rp_id',
        'event_date',
        'session',
        'present', 
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at',
        'event_date',    
    ];
    }
    
    
   public function rp()
    {
        return $this->belongsTo('App\Rp','rp_id');
    }
}
