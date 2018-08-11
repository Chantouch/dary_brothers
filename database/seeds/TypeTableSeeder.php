<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\TypeTranslation;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Type())->truncate();
        (new TypeTranslation())->truncate();

        factory(Type::class, 50)->create();
    }
}
