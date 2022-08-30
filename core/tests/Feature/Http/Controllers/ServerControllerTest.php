<?php


namespace Tests\Feature\Http\Controllers;

use App\Models\Brand;
use App\Models\Ram;
use App\Models\Server;
use App\Models\ServerRam;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    use WithFaker;

    public function testIndexServers()
    {
        $response = $this->getJson(route('servers.index'));

        $response->assertOk();
    }

    public function testStoreServer()
    {
        $data = Server::factory()->make();

//         create 4 ram modules
        $ramModules = [];
        for ($i = 0; $i < 4; $i++) {
            $ramModules[] = [
                'size' => Ram::query()->inRandomOrder()->first()->size,
                'type' => collect(ServerRam::RAM_TYPES)->random(),
                'amount' => rand(1, 10)
            ];
        }

        $brand = Brand::query()->inRandomOrder()->first();

        $this->postJson(route('servers.store'), [
            'asset_id' => $data->asset_id,
            'name' => $data->name,
            'price' => $data->price,
            'ram_modules' => $ramModules,
            'brand_id' => $brand->id
        ]);

        $this->assertDatabaseHas('servers', [
            'asset_id' => $data->asset_id,
            'name' => $data->name,
            'price' => $data->price,
            'brand_id' => $brand->id
        ]);

        $server = Server::where('asset_id', $data->asset_id)->first();
        $this->assertCount(4, $server->ramModules);
    }

    public function testDeleteServer()
    {
        $server = Server::factory()->create();
        $ram = Ram::query()->inRandomOrder()->first();
        ServerRam::create([
            'server_id' => $server->id,
            'ram_id' => $ram->id,
            'type' => collect(ServerRam::RAM_TYPES)->random(),
            'amount' => rand(1, 10)
        ]);

        $this->deleteJson(route('servers.destroy', $server->id));

        $this->assertSoftDeleted('servers', [
            'id' => $server->id
        ]);

        $this->assertDatabaseMissing('server_ram', [
            'server_id' => $server->id
        ]);
    }
}
