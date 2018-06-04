<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'chris',
            'password' => bcrypt('qwe123'),
            'email' => 'a@b.c',
            'role_id' => '1',
        ]);
    }
}
