<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = ['name','capacity','class_id','note'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function iClass()
    {
        return $this->belongsTo(iClass::class,'class_id','id');
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

}
