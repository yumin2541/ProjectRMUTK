<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
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
        return $this->belongsToMany('App\Role');
    }

    public function pet01() {
        return $this->hasMany(Petition01::class);
    }
    public function pet02() {
        return $this->hasMany(Petition02::class);
    }
    public function pet03() {
        return $this->hasMany(Petition03::class);
    }
    public function pet04() {
        return $this->hasMany(Petition04::class);
    }
    public function pet05() {
        return $this->hasMany(Petition05::class);
    }
    public function pet06() {
        return $this->hasMany(Petition06::class);
    }
    public function pet07() {
        return $this->hasMany(Petition07::class);
    }
    public function pet08() {
        return $this->hasMany(Petition08::class);
    }
    public function teacher() {
        return $this->belongsTo('App\Allcsv');
    }
    
    public function user() {
        return $this->belongsTo('App\Studentcsv');
    }


    public function hasAnyRoles($roles)
    {

        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }   

    public function hasRole($role)
    {

        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
}
