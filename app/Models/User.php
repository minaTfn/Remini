<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * user type Admin
     */
    const ADMIN = 1;
    /**
     * user type Normal
     */
    const USER = 2;

    /**
     * user is active and can login
     */
    const ACTIVE = 1;
    /**
     * user is inactive and cannot login
     */
    const INACTIVE = 0;

    /**
     * @var
     */
    public $password_confirmation;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @var array
     */
    protected $visible = [
        'name','email','role',
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
    * Get the title of the role.
    *
    * @return string
    */
    public function getRoleName(){
        return $this->role == User::ADMIN ? 'Admin' : 'User';
    }

    /**
    * change the user status from active to inactive.
    *
    */
    public function setAsActive() {
        $this->update(['status' => 1]);
    }

    /**
     * change the user status from inactive to active.
     *
     */
    public function setAsInactive() {
        $this->update(['status' => 0]);
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
