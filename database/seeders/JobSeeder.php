<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

use Carbon\Carbon;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            'Software Engineer',
            'Web Developer',
            'Data Analyst',
            'Graphic Designer',
            'Project Manager',
            'Marketing Specialist',
            'Sales Representative',
            'Accountant',
            'HR Manager',
            'Operations Coordinator',
        ];

        foreach ($jobs as $job) {
            Job::create([
                'name' => $job,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
