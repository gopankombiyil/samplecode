<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
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
    
    public function registrations()
    {
        return $this->hasMany('App\Registration','programme_id');
    }
}
