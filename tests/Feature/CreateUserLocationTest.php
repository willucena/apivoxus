<?php

namespace Tests\Feature;

use App\Http\Services\CreateUserLocation;
use App\Models\Location;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserLocationTest extends TestCase
{

    /**
     * @test
     */
    public function check_if_method_execute_exist()
    {
        $method = method_exists(CreateUserLocation::class, 'execute');
        $this->assertTrue($method);
    }

    /**
     * @test
     */
    public function it_should_store_in_database()
    {
        $user = User::factory(1)->create();
        $location = [
            'user_id' => $user[0]->id,
            'latitude' => '123546789',
            'longitude' => '123546789'
        ];

        $this->postJson('/api/location', $location)
            ->assertStatus(200);

        $this->assertDatabaseHas('locations', [
            'latitude' => $location['latitude'],
            'longitude' => $location['longitude'],
        ]);
    }

	/** @test */
    public function check_invalid_user_validation()
    {
        $location = [
            'user_id' => 0,
            'latitude' => '123546789',
            'longitude' => '123546789'
        ];

        $this->postJson('/api/location', $location)
        ->assertStatus(400);
    }
}
