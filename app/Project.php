<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @package App
 * @property Employee manager
 * @property Collection members
 * @property Collection skills
 * @property string name
 */
class Project extends Model
{
    protected $fillable = [
        'name'
    ];

    public function manager()
    {
        return $this->belongsTo(Employee::class);
    }

    public function members()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
