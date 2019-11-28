<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name', 'code', 'class_id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function iClass()
    {
        return $this->belongsTo(iClass::class,'class_id','id');
    }

    public function timetable(){
        return $this->hasMany(Timetable::class);
    }

}
