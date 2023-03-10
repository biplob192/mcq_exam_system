<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Subject::factory()->times(15)->create();

        $subjects = [
            ['name' => 'Bangla'],
            ['name' => 'English'],
            ['name' => 'Math'],
            ['name' => 'General Knowledge'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
