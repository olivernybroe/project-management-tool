<?php


namespace Tests\Unit;


use App\Education;
use App\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_education_from_school()
    {
        /** @var Education $education */
        $education = factory(Education::class)->create();

        /** @var School $school */
        $school = factory(School::class)->create();

        $school->educations()->save($education);

        $school = $school->refresh();

        $this->assertCount(1, $school->educations);

        $this->assertEquals($education->name, $school->educations->first()->name);
    }
}