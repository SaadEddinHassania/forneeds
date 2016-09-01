<?php

namespace App;

use App\Models\Citizen;
use App\Models\ServiceProvider;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function isServiceProvider()
    {
        if ($this->serviceProvider === null)
            return false;
        else
            return true;
    }

    public function isCitizen()
    {
        if ($this->citizen === null)
            return false;
        else
            return true;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'email',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function serviceProvider()
    {
        return $this->hasOne('App\Models\ServiceProvider');
    }

    public function citizen()
    {
        return $this->hasOne('App\Models\Citizen');
    }

}
