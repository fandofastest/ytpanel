<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'apikey' => 'AIzaSyAgX-SRZsa_ed__aLBix07h4oxgwQXoqPU',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
