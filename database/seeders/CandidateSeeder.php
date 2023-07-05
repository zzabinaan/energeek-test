<?php 

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'job_id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123456789',
            'year' => 2000,
        ]);

        Candidate::create([
            'job_id' => 2,
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone' => '987654321',
            'year' => 1999,
        ]);
    }
}
