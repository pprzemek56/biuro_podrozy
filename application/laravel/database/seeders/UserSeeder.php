<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'administrator',
            'email'=>'administrator@gmail.com',
            'password'=>Hash::make('admin'),
            'role_id'=>1
        ]);
        $user->save();
        $user = User::create([
            'name'=>'użytkownik',
            'email'=>'użytkownik@gmail.com',
            'password'=>Hash::make('admin'),
            'role_id'=>2
        ]);
        $user->save();
    }
}
