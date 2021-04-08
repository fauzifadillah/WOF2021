<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Event;

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
        Role::insert([
            'name' => 'Merchant'
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
        Level::insert([
            'name' => 'Denim Lord',
            'points' => '500',
        ]);
        Level::insert([
            'name' => 'Denim Master',
            'points' => '1000',
        ]);
        Level::insert([
            'name' => 'Denim Leader',
            'points' => '2000',
        ]);
        Event::insert([
            'name' => 'Coba',
            'desc' => 'Coba',
            'date' => '02-02-02',
            'start' => '11:00',
            'end' => '13:00',
            'categories_id' => 1
        ]);
    }
}
