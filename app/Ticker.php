<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    protected $fillable = [
        'newsitem',
        'link',
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at',  
        
    ];
    }
    
}
