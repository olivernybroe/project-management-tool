<?php


namespace Tests\Unit;


use App\Employee;
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
}