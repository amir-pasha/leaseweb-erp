<?php

namespace Tests\Feature\Http\Controllers;


use Tests\TestCase;

class GetBrandsTest extends TestCase
{
    public function testGetBrands()
    {
        $response = $this->getJson('/brands');

        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
