<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'username' => 'admin',
            'nik' => 123,
            'name' => 'adii',
            'password' =>bcrypt('123456'),
            'email' => 'adi@gmail.com'
        ]);
    }
}
