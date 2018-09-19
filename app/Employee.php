<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;

/**
 * Class Employee
 *
 * @package App
 * @property Collection skills
 * @property Collection educations
 * @property Collection projects
 * @property Collection manages
 * @property string name
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

    public function educations()
    {
        return $this->belongsToMany(Education::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function manages()
    {
        return $this->hasMany(Project::class, 'manager_id');
    }
}
