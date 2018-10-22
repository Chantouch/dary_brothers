<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Category())->truncate();
        (new CategoryTranslation())->truncate();
        factory(Category::class, 1)->create();
    }
}
