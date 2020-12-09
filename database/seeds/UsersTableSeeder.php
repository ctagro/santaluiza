<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name'       => 'Joao Vale',
            'email'      => 'louresvale@gmail.com',
            'password'   => bcrypt('asdfqwer'),
        ]);

        User::create([
            'name'       => 'Joao Procopio',
            'email'      => 'jp.loures.vale@gmail.com',
            'password'   => bcrypt('asdfqwer'),
        ]);
    }
}
