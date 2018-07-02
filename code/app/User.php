<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id', 'registration_complete', 'registration_handled_by_id'
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
     * Checks if the current user is of the given role.
     *
     * @return boolean
     */
    private function isRole($roleName)
    {
        return (bool) DB::table('user_types')
            ->where('id','=', $this->user_type_id)
            ->where('name','=', $roleName)->count();
    }

    public function isStudent()
    {
        return $this->isRole('Student');
    }

    public function isTutor()
    {
        return $this->isRole('Tutor');
    }

    public function isAdmin()
    {
        return $this->isRole('Admin');
    }
}
