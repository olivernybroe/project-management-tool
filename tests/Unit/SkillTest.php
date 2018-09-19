<?php


namespace Tests\Unit;


use App\Employee;
use App\Project;
use App\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_employees_from_skill()
    {
        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        /** @var Skill $skill */
        $skill = factory(Skill::class)->create();

        $skill->employees()->save($employee, ['expertise' => 40]);

        $skill = $skill->refresh();

        $this->assertCount(1, $skill->employees);
        $this->assertEquals($employee->name, $skill->employees->first()->name);
        $this->assertEquals(40, $skill->employees->first()->pivot->expertise);
    }

    /** @test */
    public function can_get_projects_from_skill()
    {
        /** @var Project $project */
        $project = factory(Project::class)->create();

        /** @var Skill $skill */
        $skill = factory(Skill::class)->create();

        $skill->projects()->save($project);

        $skill = $skill->refresh();

        $this->assertCount(1, $skill->projects);
        $this->assertEquals($project->name, $skill->projects->first()->name);
    }
}