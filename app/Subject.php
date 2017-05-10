<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at',  
        
    ];
    }
    
    public function participants()
    {
        return $this->hasMany('App\Participant','subject_id');
    }
    
    public function rps()
    {
        return $this->hasMany('App\Rp','subject_id');
    }
}
