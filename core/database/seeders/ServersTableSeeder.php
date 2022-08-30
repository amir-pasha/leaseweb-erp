<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Ram;
use App\Models\Server;
use App\Models\ServerRam;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServersTableSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            $server = new Server();
            $server->fill([
                'asset_id' => $this->faker->unique()->numberBetween(1, 1000000),
                'name' => Str::upper($this->faker->randomLetter()) . '-' . rand(1, 1000),
                'price' => rand(50, 1000),
                'brand_id' => Brand::query()->inRandomOrder()->first()->id,
            ]);
            $server->save();

            for ($j = 0; $j < rand(1, 5); $j++) {
               ServerRam::insert([
                   'server_id' => $server->id,
                   'ram_id' => Ram::query()->inRandomOrder()->first()->id,
                   'type' => collect(ServerRam::RAM_TYPES)->random(),
                   'amount' => rand(1,10)
               ]);
            }
        }
    }
}
