<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\SliderTranslation;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        (new Slider())->truncate();
        (new SliderTranslation())->truncate();

        factory(Slider::class, 5)->create();
    }
}
