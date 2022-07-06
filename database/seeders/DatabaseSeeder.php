<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SpecialistSeeder;
use App\Http\Controllers\Admin\Specialist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserSeeder;
        $role = new RoleSeeder;
        $specialist = new SpecialistSeeder;
        $role->run();
        $user->run();
        $specialist->run();
    }
}
