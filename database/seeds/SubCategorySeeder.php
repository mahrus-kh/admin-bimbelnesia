<?php

use Illuminate\Database\Seeder;
use App\Model\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'sub_category' => "Bimbel SD/MI",
            'slug' => str_slug("Bimbel SD/MI"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "Bimbel SMP/MTs",
            'slug' => str_slug("Bimbel SMP/MTs"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "Bimbel SMA/MA/SMK",
            'slug' => str_slug("Bimbel SMA/MA/SMK"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "PKN STAN & STIS",
            'slug' => str_slug("PKN STAN & STIS"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "Privat Bahasa Inggris",
            'slug' => str_slug("Privat Bahasa Inggris"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "CPNS/PNS",
            'slug' => str_slug("CPNS/PNS"),
            'fa_icon' => "foo"
        ]);
        SubCategory::create([
            'sub_category' => "Kedokteran",
            'slug' => str_slug("Kedokteran"),
            'fa_icon' => "foo"
        ]);
    }
}
