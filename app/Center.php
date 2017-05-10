<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name',
        'rpincharge',        
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at',  
        
    ];
    }
    
   
    
    public function rps()
    {
        return $this->hasMany('App\Rp','center_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','rpincharge');
    }
    
    public function registrations()
    {
        return $this->hasMany('App\Registration','center_id');
    }
    
}
