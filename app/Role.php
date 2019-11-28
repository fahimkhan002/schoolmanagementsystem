<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table ='roles' ;
    protected $fillable = [
        'name'
    ];
    protected $primaryKey ='id';
    public $timestamps =false;

    public function users(){
        return	$this->hasMany('App\User','role_id','id');
    }
}
