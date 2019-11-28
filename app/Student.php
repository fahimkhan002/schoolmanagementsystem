<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['dob','gender','address','photo','fathername','fatherphoneno','note','idcard','user_id','class_id','section_id','enrollmentDate','completionDate'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function iClass(){
        return $this->belongsTo(iClass::class,'class_id','id');
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }

}
