<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillSet;
use App\Models\Skill;
use App\Models\Candidate;

use Carbon\Carbon;

class SkillSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = Candidate::all();
        $skills = Skill::pluck('id')->toArray();

        foreach ($candidates as $candidate) {
            $randomSkills = array_rand($skills, 2);
            
            foreach ($randomSkills as $randomSkill) {
                SkillSet::create([
                    'candidate_id' => $candidate->id,
                    'skill_id' => $skills[$randomSkill],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
