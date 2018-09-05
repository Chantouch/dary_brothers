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
            'name' => 'Super Admin',
            'email' => 'super.admin@example.com',
            'password' => 'secret',
            'remember_token' => str_random(10)
        ]);
        factory(User::class, 10)->create();
    }
}
