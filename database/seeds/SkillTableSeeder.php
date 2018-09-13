<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSkills([
            'PHP',
            'Java',
            'C#',
            'Python',
        ]);
    }

    public function createSkills($names)
    {
        foreach ($names as $name) {
            $this->createSkill($name);
        }
    }

    public function createSkill($name)
    {
        return factory(\App\Skill::class)->create([
            'name' => $name
        ]);
    }
}
