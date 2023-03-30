<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create
        (
            [
                'name' => 'Tridiktya Hardani Putra',
                'email' => 'tridiktya@gmail.com',
                'nisn' => '0085196127',
                'password' => bcrypt('tridik12'),
            ]
        );

        User::factory(3)->create();
    }
}
