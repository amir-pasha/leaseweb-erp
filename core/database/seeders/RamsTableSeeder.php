<?php

namespace Database\Seeders;

use App\Models\Ram;
use Illuminate\Database\Seeder;

class RamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            $size = pow(2, $i);
            Ram::firstOrCreate([
                'size' => $size
            ]);
        }
    }
}
