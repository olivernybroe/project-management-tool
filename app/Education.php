<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 *
 * @package App
 * @property School school
 * @property string name
 * @property Collection employees
 */
class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'name'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
