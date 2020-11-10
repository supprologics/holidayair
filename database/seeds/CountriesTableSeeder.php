<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country1=Country::create([
            'name'=>'Sri Lanka',
            'code'=>'SL'
        ]);

        $country2=Country::create([
            'name'=>'Kenya',
            'code'=>'KE'
        ]);
        
        $country3=Country::create([
            'name'=>'Dubai',
            'code'=>'DB'
        ]);
    }
}
