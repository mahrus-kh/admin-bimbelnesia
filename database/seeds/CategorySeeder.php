<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
           'category' => "Bimbel Reguler",
            'slug' => str_slug("Bimbel Reguler")
        ]);
        Category::create([
            'category' => "Kursus",
            'slug' => str_slug("Kursus")
        ]);
        Category::create([
            'category' => "Les Private",
            'slug' => str_slug("Les Privat")
        ]);
        Category::create([
            'category' => "Pelatihan",
            'slug' => str_slug("Pelatihan")
        ]);
    }
}
