<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 *
 * @package App
 * @property Collection employees
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
}
