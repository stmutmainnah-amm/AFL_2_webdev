<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Models\User;

class AssignProjectUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:project-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign random existing users to projects that have no user_id';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $projects = Project::whereNull('user_id')->get();
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            $this->error('No users found in the database. Aborting.');
            return 1;
        }

        foreach ($projects as $p) {
            $p->user_id = $userIds[array_rand($userIds)];
            $p->save();
        }

        $this->info('Assigned '.count($projects).' projects to users.');
        $this->info('Projects remaining without user_id: '.Project::whereNull('user_id')->count());

        return 0;
    }
}
