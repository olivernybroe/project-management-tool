<?php

namespace App;

use Carbon\Carbon;
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

    public function findEmployees()
    {
        $members = $this->members()->pluck('id');


        $query = Employee::with([
            'skills'
        ])->whereNotIn('id', $members->push($this->manager()->pluck('id')));

        $employees = $query->get();

        // Calculate the coverage which the manager supplies with
        $this->manager->skills->each(function (Skill $skill) {
            $projectSkill = $this->skills->find($skill->getKey());
            if(!is_null($projectSkill)) {
                $projectSkill->coverage += $skill->pivot->expertise;
                $projectSkill->possibleCoverage += $skill->pivot->expertise;
            }
        });

        // Calculate the coverage which the members of the project supplies with
        $this->members->each(function (Employee $member) {
            $member->skills->each(function (Skill $skill) {
                $projectSkill = $this->skills->find($skill->getKey());
                if(!is_null($projectSkill)) {
                    $projectSkill->coverage += $skill->pivot->expertise;
                    $projectSkill->possibleCoverage += $skill->pivot->expertise;
                }
            });
        });


        // Calculate the possible coverage for all the employees which are not part of the project
        $this->skills->each(function (Skill $skill) use ($employees) {
            $employees->each(function (Employee $employee) use ($skill) {
                if($employee->skills->contains($skill)) {
                    $employee->possibleCoverage += $employee->skills->find($skill->getKey())->pivot->expertise;
                }
            });
        });



        $employees->each(function (Employee $employee) {
            $employee->possibleCoverage =
                ($employee->possibleCoverage ?? 0) +
                $employee->employed_at->diffInYears(Carbon::now()) * 10;
        });

        return [
            'employees' => $employees,
            'skillSatisfaction' => $this->skills
        ];
    }
}
