<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ADMIN = 1;
    const USER = 2;

    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    public function active() {
        $this->update(['status' => 1]);
    }

    /**
     * change the user status from inactive to active.
     *
     */
    public function inactive() {
        $this->update(['status' => 0]);
    }
}
