<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = 'timetable';
    protected $fillable = ['class_id','section_id','teacher_id','days','Start_Time'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function alreadyHas($condition)
    {
        return $this->where($condition)->exists();
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function iClass()
    {
        return $this->belongsTo(iClass::class,'class_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id','teacher_id');
    }



}
