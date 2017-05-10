<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = [
        'participant_id',
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
    
    
   public function participant()
    {
        return $this->belongsTo('App\Participant','participant_id');
    }
}
