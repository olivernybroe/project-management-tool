<?php


namespace Tests\Unit;


use App\Education;
use App\Employee;
use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EducationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_create_a_education()
    {
        /** @var Education $education */
        $education = factory(Education::class)->create();

        $this->assertTrue($education->exists);
    }

    /** @test */
    public function can_get_school_from_education()
    {
        /** @var School $school */
        $school = factory(School::class)->create();

        /** @var Education $education */
        $education = factory(Education::class)->create([
            'school_id' => $school->getKey()
        ]);

        $education = $education->refresh();

        $this->assertEquals($school->name, $education->school->name);
    }

    /** @test */
    public function can_get_employees_from_education()
    {
        /** @var Employee $employee */
        $employee = factory(Employee::class)->create();

        /** @var Education $education */
        $education = factory(Education::class)->create();

        $education->employees()->save($employee);

        $education = $education->refresh();

        $this->assertCount(1, $education->employees);
        $this->assertEquals($employee->name, $education->employees->first()->name);
    }
}