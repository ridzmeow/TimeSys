<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->delete();
        Schedule::create(array('name' => 'Regular'));
        Schedule::create(array('name' => 'Morning Shift'));
        Schedule::create(array('name' => 'Night Shift'));
    }
}
