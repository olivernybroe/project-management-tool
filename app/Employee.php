<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Employee extends User
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Set the remember token name to null.
     * This will cause the employee ot have no support for remember tokens.
     *
     * @return null
     */
    public function getRememberTokenName()
    {
        return null;
    }


}
