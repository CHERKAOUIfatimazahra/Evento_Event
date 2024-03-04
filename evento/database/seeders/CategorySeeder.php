<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define your category names
        $categoryNames = [
            'business', 
            'social', 
            'cultural',
            'educational', 
            'sporting', 
            'charity', 
            'entertainment', 
            'gaming', 
            'anime'];

        // Create categories
        foreach ($categoryNames as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
