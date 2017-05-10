<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
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
        return $this->hasMany('App\Participant','type_id');
    }
    
    public function rps()
    {
        return $this->hasMany('App\Rp','type_id');
    }
}
