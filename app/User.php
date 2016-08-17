<?php

namespace App;

use PhotoSession;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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
     * A user may have a role
     * @return Illuminate\Database\Eloquent\Relationships\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * A user has photosessions
     * @return Illuminate\Database\Eloquent\Relationships\HasMany
     */
    public function photosessions()
    {
        return $this->hasMany('App\PhotoSession');
    }

    /**
     * Check if the user has a role assigned
     * @param  string  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->attach($role);
        }
    }

     public function removeRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->detach($role);
        }
    }

    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the user's last name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * get the full name of user
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}