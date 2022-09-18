<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 10
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' => 1
        ]);

        // $this->call(CompanySeeder::class);
    }
}
