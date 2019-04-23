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
        \App\User::create([
            'first_name' => 'lena',
            'email' => 'lena@gmail.com',
            'password' => bcrypt('admin123'),
            'phone_number' => '0643737373'
        ]);
        factory(App\User::class, 20)->create();
    }
}
