<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->username = "admin";
        $user->password = Hash::make('admin');
        $user->role_id = 1;
        $user->isNew = 0;
        $user->save();

        $employee = new Employee();       
        $employee->first_name  = "Admin";
        $employee->last_name   = "Admin";
        $employee->office_id   = 1;
        $employee->schedule_id = 1;
        $employee->user_id     = $user->id;
        $employee->save();
    }
}
