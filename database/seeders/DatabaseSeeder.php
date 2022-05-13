<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\User_Project;
use App\Models\Work;
use App\Models\WorkType;
use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\True_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $project = Project::create([
            'name' => 'Software development project no 1.',
            'status' => TRUE
        ]);

        $worktype = WorkType::create([
            'name' => 'Testing'
        ]);

        $worktype = WorkType::create([
            'name' => 'Debugging'
        ]);

        $worktype = WorkType::create([
            'name' => 'Programming'
        ]);
        $worktype = WorkType::create([
            'name' => 'Marketing'
        ]);

        $worktype = WorkType::create([
            'name' => 'Advertising'
        ]);

        $worktype = WorkType::create([
            'name' => 'Developing'
        ]);
        $worktype = WorkType::create([
            'name' => 'Backend development'
        ]);

        $worktype = WorkType::create([
            'name' => 'Frontend development'
        ]);

        $worktype = WorkType::create([
            'name' => 'Routing'
        ]);
        $worktype = WorkType::create([
            'name' => 'CSS'
        ]);

        $worktype = WorkType::create([
            'name' => 'JavaScript'
        ]);

        $worktype = WorkType::create([
            'name' => 'PHP'
        ]);

        $project = Project::where('id', 1)->first();
        $user = User::where('id', 1)->first();
        $user_project = new User_Project();
        $user_project->user()->associate($user);
        $user_project->project()->associate($project);
        $user_project->save();

        $project = Project::where('id', 1)->first();
        $worktype = WorkType::where('name', 'Testing')->first();
        $user = User::where('id', 1)->first();
        $work = new Work();
        $work->from = '2022-01-01 12:00:00';
        $work->to = '2022-01-03 12:00:00';
        $work->time_spent_min = 240;
        $work->comment = 'Tested the developed software and got perfect results';
        $work->project()->associate($project);
        $work->user()->associate($user);
        $work->worktype()->associate($worktype);
        $work->save();

    }
}
