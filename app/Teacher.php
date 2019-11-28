<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['id_card','designation','qualification','dob','gender','phone_no','address','joining_date','photo','user_id'];
    protected $primaryKey = 'teacher_id';
    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($teacher) {
            $teacher->user->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function timetable(){
        return $this->hasMany(Teacher::class);
    }
}
