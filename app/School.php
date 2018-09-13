<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @package App
 * @property string name
 * @property Collection educations
 */
class School extends Model
{
    protected $fillable = [
        'name',
    ];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
