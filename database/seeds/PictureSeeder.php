<?php

use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Picture::class, 50)->create()->each(function ($picture) {
           $imagePath = base_path('tests').'/images/1.jpg';

           $picture->save();

           $picture->init($imagePath);

           $picture->location()->save(factory(App\Location::class)->create());
       });
    }
}
