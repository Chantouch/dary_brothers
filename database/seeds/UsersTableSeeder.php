<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new User)->truncate();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@darybrothers.biz',
            'password' => '@min123456',
            'remember_token' => str_random(10)
        ]);
        factory(User::class, 1)->create();
    }
}
