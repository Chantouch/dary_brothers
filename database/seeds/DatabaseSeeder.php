<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(SliderTableSeeder::class);
    }
}
