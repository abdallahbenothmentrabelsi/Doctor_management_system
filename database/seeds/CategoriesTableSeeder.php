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
            'name' => 'neonates'
        ]);
        
        Category::create([
            'name' => 'child'
        ]);

        Category::create([
            'name' => 'adult'
        ]);

        Category::create([
            'name' => 'Epileptic encephalopathy'
        ]);

}

}
