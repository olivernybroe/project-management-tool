<?php


namespace Tests\Unit;


use App\Employee;
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
}