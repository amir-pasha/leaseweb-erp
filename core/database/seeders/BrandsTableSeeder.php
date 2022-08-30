<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'HP',
            'Dell',
            'IBM'
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate([
                'name' => $brand
        ]);
        }
    }
}
