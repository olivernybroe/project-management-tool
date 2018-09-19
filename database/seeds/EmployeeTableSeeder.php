<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Employee::class)->create([
            'id' => 1,
            'name' => 'Oliver'
        ]);

        factory(\App\Employee::class)->times(10)->create();
    }
}
