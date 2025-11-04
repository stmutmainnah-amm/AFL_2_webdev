<?php
// This file is meant to be required from within `php artisan tinker --execute` so
// that the Laravel application is already bootstrapped and facades work.

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;

$user = User::where('email', 'tinker+rel@test')->first();
if (! $user) {
    $user = User::create([
        'name' => 'Tinker User',
        'email' => 'tinker+rel@test',
        'password' => bcrypt('password'),
    ]);
}

$project = Project::first();
if (! $project) {
    $project = Project::create();
}

$project->user()->associate($user);
$project->save();

$comment = Comment::create([
    'project_id' => $project->id,
    'user_id' => $user->id,
    'body' => 'Automated comment via tinker include',
]);

print_r(Project::with('user','comments.user')->find($project->id)->toArray());
echo "\nOK\n";
