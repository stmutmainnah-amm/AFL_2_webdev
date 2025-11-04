<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some users, projects and comments
        $users = \App\Models\User::factory()->count(5)->create();

        foreach ($users as $user) {
            // create 3 projects per user
            $projects = \App\Models\Project::factory()->count(3)->make();
            // associate each project to user then save
            foreach ($projects as $project) {
                $user->projects()->save($project);

                // for each project create 2 comments from random users
                $commentUsers = $users->random(2);
                foreach ($commentUsers as $cuser) {
                    $project->comments()->create([
                        'user_id' => $cuser->id,
                        'body' => \Illuminate\Support\Str::limit(\Illuminate\Support\Str::title(fake()->sentence(12)), 255),
                    ]);
                }
            }
        }
    }
}
