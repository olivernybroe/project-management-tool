<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;

/**
 * Class Employee
 *
 * @package App
 * @property Collection skills
 */
class Employee extends User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot(['expertise']);
    }
}
