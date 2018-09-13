<?php

use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Education::class)->create([
            'name' => 'Software Development',
            'school_id' => 1
        ]);
    }
}
