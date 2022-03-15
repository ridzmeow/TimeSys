<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave;
use DB;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->delete();
        Leave::create(array('name' => 'Sick',     'isAbsent' => 0));
        Leave::create(array('name' => 'Vacation', 'isAbsent' => 0));
        Leave::create(array('name' => 'Other',    'isAbsent' => 1));
    }
}
