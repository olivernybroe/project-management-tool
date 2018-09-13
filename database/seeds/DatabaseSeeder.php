<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeeTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(EducationTableSeeder::class);
    }
}
