<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LeaveSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
