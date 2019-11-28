<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iClass extends Model
{
    protected $table = 'classes';
    protected $fillable = ['name','numericvalue','group','note'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function timetable(){
        return $this->hasMany(Timetable::class);
    }

}
