<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'Bangla',
                'short_name' => 'BN',
            ],
            [
                'name' => 'English',
                'short_name' => 'EN',
            ],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
