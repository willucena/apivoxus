<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowUserLocationTest extends TestCase
{
	/** @test */
    public function it_should_return_succesd_code()
    {
        $user = User::first();

        $this->get('/api/user/'.$user->id )
            ->assertStatus(200);
    }
}
