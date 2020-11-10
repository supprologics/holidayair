<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1=Category::create([
            'name'=>'All Inclusive Deals',
        ]);
        
        $category2=Category::create([
            'name'=>'Cultural Tours',
        ]);
        
        $category3=Category::create([
            'name'=>'Adventure Holidays',
        ]);
        
        $category4=Category::create([
            'name'=>'Wild Life & Beach Stay',
        ]);
        
        $category5=Category::create([
            'name'=>'Over Night Tours',
        ]);
        
        $category6=Category::create([
            'name'=>'Honeymoon & Romantic',
        ]);
        
        $category7=Category::create([
            'name'=>'Nature & Adventure',
        ]);
        
        $category8=Category::create([
            'name'=>'Cultural Experience',
        ]);
        
        $category8=Category::create([
            'name'=>'Day Excursions Srilanka',
        ]);
        
        $category8=Category::create([
            'name'=>'Half-Day Excursions Sri Lanka',
        ]);
        
        $category8=Category::create([
            'name'=>'Kenya & Tanzania Tours',
        ]);
    }
}
