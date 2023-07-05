<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use Carbon\Carbon;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Programming',
            'Web Development',
            'Database Management',
            'Data Analysis',
            'Graphic Design',
            'Project Management',
            'Marketing',
            'Sales',
            'Communication',
            'Leadership',
            'Problem Solving',
            'Time Management',
            'Critical Thinking',
            'Teamwork',
            'Negotiation',
        ];


        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
