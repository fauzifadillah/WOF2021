<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'name' => 'Admin'
        ]);
        Role::insert([
            'name' => 'User'
        ]);
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@wof2021.com',
            'password' => Hash::make('adminwof'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'roles_id' => 1
        ]);
        Category::insert([
            'name' => 'Life Talks'
        ]);
        Category::insert([
            'name' => 'Life Insights'
        ]);
        Category::insert([
            'name' => 'Music'
        ]);
    }
}
