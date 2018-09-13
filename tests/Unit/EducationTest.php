<?php


namespace Tests\Unit;


use App\Education;
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
}