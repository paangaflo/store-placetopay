<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Monitores'
        ]);
        Category::create([
            'name' => 'Maletines de transporte'
        ]);
    }
}
