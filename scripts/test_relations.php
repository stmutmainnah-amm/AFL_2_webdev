<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;

// create a user via factory if available, else create simple user
if (class_exists(User::class) && method_exists(User::class, 'factory')) {
    $user = User::factory()->create([
        'name' => 'Tinker User',
        'email' => 'tinker+rel@test'
    ]);
} else {
    $user = User::create([
        'name' => 'Tinker User',
        'email' => 'tinker+rel@test',
        'password' => bcrypt('password')
    ]);
}

$project = Project::first();
if (!$project) {
    $project = Project::create();
}

$project->user()->associate($user);
$project->save();

$comment = Comment::create([
    'project_id' => $project->id,
    'user_id' => $user->id,
    'body' => 'Automated test comment'
]);

$p = Project::with('user','comments.user')->find($project->id);
print_r($p->toArray());
echo "OK\n";
