<?php

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
        $user = \App\Models\User::create([
        'name' => 'super admin',
        'email' => 'admin@domain.com',
        'password' => bcrypt('12345678'),

        ]);

        $user->attachRole('super_admin');
    }// End of Run

} // End of Seeder
