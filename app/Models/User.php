<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail {
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * user type Admin
     */
    const ADMIN = 1;

    /**
     * user type Normal
     */
    const USER = 2;

    /**
     * user type Site User
     */
    const SiteUSER = 3;

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
    public $old_password;

    /**
     * @var array
     */
    protected $guarded = ['password_confirmation', 'old_password'];

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
        'name', 'email', 'role',
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
     * Scope a query to only include Site users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSite($query) {
        return $query->where('role', '=', User::SiteUSER);
    }

    /**
     * Get the title of the role.
     *
     * @return string
     */
    public function getRoleName() {
        return $this->role == User::ADMIN ? 'Admin' : ($this->role == User::USER ? 'User' : 'Site User');
    }

    /**
     * change the user status from active to inactive.
     *
     */
    public function setAsActive() {
        $this->update(['status' => 1]);
    }


    /**
     * @param $delivery
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addDelivery($delivery) {
        return $this->deliveries()->create($delivery);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries() {
        return $this->hasMany(Delivery::class)->latest();
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
