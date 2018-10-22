<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTranslation;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Product)->truncate();
        (new ProductTranslation)->truncate();

        factory(Product::class, 5)->create();

        $categories = Category::all();

        Product::all()->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1, 1))->pluck('id')->toArray()
            );
        });
    }
}
