<?php

namespace Database\Seeders;

use App\Models\Admin\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'pages_page',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'about_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'resume_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'skill_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'counter_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'service_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'portfolio_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'client_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'team_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'call_to_action_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'blog_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'contact_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'footer_section',
            'status' => 'show'
        ]);

        // Create datas
        Section::create([
            'language_id' => 1,
            'section' => 'preloader',
            'status' => 'show'
        ]);

    }
}
