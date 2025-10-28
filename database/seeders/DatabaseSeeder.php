<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // disable FK checks for safe truncation (MySQL)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('project_skill')->truncate();
        DB::table('projects')->truncate();
        DB::table('skills')->truncate();
        DB::table('experiences')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = Carbon::now()->toDateTimeString();

        // Skills (5 dummy)
        $skillNames = [
            'Python',
            'Machine Learning',
            'Robotics',
            'Laravel',
            'Data Science'
        ];

        $skillIds = [];
        foreach ($skillNames as $name) {
            $skillIds[] = DB::table('skills')->insertGetId([
                'name' => $name,
                'level' => 'Intermediate',
                'icon' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Projects (5 dummy)
        $projectIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $title = "Project Sample {$i}";
            $projectIds[] = DB::table('projects')->insertGetId([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'description' => "This is a sample description for {$title}. Built as part of portfolio demo.",
                'cover_image' => null,
                'url' => "https://github.com/yourusername/project-sample-{$i}",
                'started_at' => Carbon::now()->subMonths(6 + $i)->toDateString(),
                'ended_at' => Carbon::now()->subMonths($i)->toDateString(),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Experiences (5 dummy)
        for ($i = 1; $i <= 5; $i++) {
            DB::table('experiences')->insert([
                'company' => "Company {$i}",
                'role' => $i === 1 ? 'Intern' : 'Engineer',
                'description' => "Worked on projects related to AI and automation at Company {$i}.",
                'start_date' => Carbon::now()->subYears(2 + $i)->toDateString(),
                'end_date' => $i === 1 ? null : Carbon::now()->subYears(1 + $i)->toDateString(),
                'is_current' => $i === 1 ? true : false,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Attach 1-3 random skills to each project
        foreach ($projectIds as $pid) {
            shuffle($skillIds);
            $count = rand(1, 3);
            $attach = array_slice($skillIds, 0, $count);
            foreach ($attach as $sid) {
                DB::table('project_skill')->insert([
                    'project_id' => $pid,
                    'skill_id' => $sid,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
