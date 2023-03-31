<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use App\Http\Controllers\EncryptionController;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController
        $keys = $encryptionController->generateRSAKeys(100, 1000);

        $nisn_1 = $encryptionController->encryptRSA('0032592461', $keys['public']);

        User::create
        (
            [
                'name' => 'Naufal Arfan Putra Azaruddin',
                'email' => 'napa@gmail.com',
                'nisn' => $nisn_1,
                'password' => bcrypt('password'),
            ],
        );

        // User::factory(3)->create();
    }
}
