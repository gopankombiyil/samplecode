<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Registration extends Model
{
    protected $fillable = [
        'center_id',
        'programme_id',
        'user_id',
        'rp',
        'participants',
        'from_dt',
        'to_dt',
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at', 
        'from_dt',
        'to_dt',
    ];
    }
    
    public function getFromDtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setFromDtAttribute($value)
    {
        $this->attributes['from_dt'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
        
    }
    
    public function getToDtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function settoDtAttribute($value)
    {
        $this->attributes['to_dt'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
        
    }
    
    public function programme()
    {
        return $this->belongsTo('App\Programme','programme_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function participant()
    {
        return $this->hasMany('App\Participant','registration_id');
    }
    
    public function rps()
    {
        return $this->hasMany('App\Rp','registration_id');
    }
    
    public function center()
    {
        return $this->belongsTo('App\Center','center_id');
    }
    
}
