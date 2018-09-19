<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 *
 * @package App
 * @property Collection employees
 * @property Collection projects
 * @property string name
 */
class Skill extends Model
{
    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withPivot(['expertise']);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
