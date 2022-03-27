<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'nickname' => 'admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'name' => 'Admin Sahis',
        ]);

         //\App\Models\User::factory(10)->create();
    }
}
