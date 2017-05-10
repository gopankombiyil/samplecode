<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'code',
        'name',
        'finance_type',
        'phone_school',
        'name_hm',
        'phone_hm',
        'edu_district',
        'sub_district',
        'level_type',
        'level_name',
        
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
        return $this->hasMany('App\Participant','school_id');
    }
    
    public function rps()
    {
        return $this->hasMany('App\Rp','school_id');
    }
}
