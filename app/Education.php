<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 *
 * @package App
 * @property School school
 * @property string name
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
}
