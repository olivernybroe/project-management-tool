<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Project::class)->create([
            'name' => 'Wordpress commercial website',
            'manager_id' => 1
        ]);
    }
}
