<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $rememberTokenName = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /** 
     * @param string|array $roles
     */

    public function authorizeRoles($roles){  
        if (is_array($roles)) {      
            return $this->hasAnyRole($roles) || 
            abort(401, 'This action is unauthorized.');  
        }  
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    /** 
     * Check multiple roles
     *  @param array $roles
     */
    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /** Check one role
     * @param string $role
     */

    public function hasRole($role){ 
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'admin')->exists();
    }
    
}
