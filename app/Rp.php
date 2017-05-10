<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rp extends Model
{
    protected $fillable = [
        'name',
        'school_id',
        'registration_id',
        'subject_id',
        'type_id',
        'email',
        'mobile',
    ];
    
    public function getDates()
    {
    return [
        'created_at',
        'updated_at',  
        
    ];
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Type','type_id');
    }
    
    public function registration()
    {
        return $this->belongsTo('App\Registration','registration_id');
    }
    
    public function school()
    {
        return $this->belongsTo('App\School','school_id');
    }
    
    public function attendances()
    {
        return $this->hasMany('App\Rpattendance','rp_id');
    }
}
