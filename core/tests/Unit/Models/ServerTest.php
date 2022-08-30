<?php

namespace Tests\Unit\Models;


use App\Models\Ram;
use App\Models\Server;
use App\Models\ServerRam;
use Tests\TestCase;

class ServerTest extends TestCase
{
    public function testServerRamModules()
    {
        $server = Server::factory()->create();

        $ram = Ram::query()->inRandomOrder()->first();

        for ($i=0; $i < 5;$i++) {
            ServerRam::create([
                'server_id' => $server->id,
                'ram_id' => $ram->id,
                'type' => collect(['DDR3', 'DDR4'])->random(),
                'amount' => rand(1, 10)
            ]);
        }

        $this->assertCount(5, $server->ramModules);
    }
}
