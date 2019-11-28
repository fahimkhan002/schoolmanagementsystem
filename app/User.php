<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','active','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return  $this->hasOne('App\Role','id','role_id');
    }

    private function checkIfUserHasRole($need_role){
        return ($need_role==$this->role->name) ? true : false;
    }

    public function hasRole($roles)
    {
        if (is_array($roles))
        {
            foreach ($roles as $need_role)
            {
                if ($this->checkIfUserHasRole($need_role))
                {
                    return true;
                }
                else
                {
                    return $this->checkIfUserHasRole($roles);
                }

            }

        }
        return false;
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }
}
