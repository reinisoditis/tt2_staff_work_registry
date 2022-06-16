<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $Role = Role::create([
            'name' => 'Default User'
        ]);

        $Role = Role::create([
            'name' => 'Manager'
        ]);

        $Role = Role::create([
            'name' => 'Admin'
        ]);

    }
}
