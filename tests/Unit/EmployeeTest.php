<?php


namespace Tests\Unit;


use App\Education;
use App\Employee;
use App\Project;
use App\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_a_employee()
    {
        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        $this->assertTrue($employee->exists);
    }

    /** @test */
    public function can_get_skills_from_employee()
    {
        $skill = factory(Skill::class)->create();

        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        $employee->skills()->save($skill, ['expertise' => 33]);

        $employee = $employee->refresh();

        $this->assertCount(1, $employee->skills);
        $this->assertEquals($skill->name, $employee->skills->first()->name);
        $this->assertEquals(33, $employee->skills->first()->pivot->expertise);
    }

    /** @test */
    public function can_get_educations_from_employee()
    {
        $education = factory(Education::class)->create();

        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        $employee->educations()->save($education);

        $employee = $employee->refresh();

        $this->assertCount(1, $employee->educations);
        $this->assertEquals($education->name, $employee->educations->first()->name);
    }

    /** @test */
    public function can_get_projects_which_employee_is_part_of()
    {
        /** @var Project $project */
        $project = factory(Project::class)->create();

        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        $employee->projects()->save($project);

        $employee = $employee->refresh();

        $this->assertCount(1, $employee->projects);
        $this->assertEquals($project->name, $employee->projects->first()->name);
    }

    /** @test */
    public function can_get_projects_which_employee_manages()
    {
        /** @var Project $project */
        $project = factory(Project::class)->create();

        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        $employee->manages()->save($project);

        $employee = $employee->refresh();

        $this->assertCount(1, $employee->manages);
        $this->assertEquals($project->name, $employee->manages->first()->name);
    }
}