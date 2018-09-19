<?php


namespace Tests\Unit;



use App\Employee;
use App\Project;
use App\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_manager_from_project()
    {
        /** @var Employee $manager */
        $manager = factory(Employee::class)->create();

        /** @var Project $project */
        $project = factory(Project::class)->create([
            'manager_id' => $manager->getKey()
        ]);

        $this->assertEquals($manager->name, $project->manager->name);
    }

    /** @test */
    public function can_get_employees_in_project()
    {
        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        /** @var Project $project */
        $project = factory(Project::class)->create();

        $project->members()->save($employee);

        $project = $project->refresh();

        $this->assertCount(1, $project->members);
        $this->assertEquals($employee->name, $project->members->first()->name);

    }

    /** @test */
    public function can_get_skills_for_project()
    {
        /** @var Skill $skill */
        $skill = factory(Skill::class)->create();

        /** @var Project $project */
        $project = factory(Project::class)->create();

        $project->skills()->save($skill);

        $project = $project->refresh();

        $this->assertCount(1, $project->skills);
        $this->assertEquals($skill->name, $project->skills->first()->name);
    }

}