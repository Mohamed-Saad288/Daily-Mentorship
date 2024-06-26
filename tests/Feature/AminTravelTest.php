<?php

namespace Tests\Feature;

use App\Models\Role;
use Database\Seeders\RoleSeeder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AminTravelTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_user_cannot_access_adding_travels(): void
    {
        $response = $this->postJson('/api/v1/admin/travels');

        $response->assertStatus(401);
    }
    public function test_none_admin_user_cannot_access_adding_travels(): void
    {
        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name','editor')->value('id'));
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels');
        $response->assertStatus(403);
    }
    public function test_saves_travel_successfully_with_valid_data(): void
    {
        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name','admin')->value('id'));
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels',[
            'name' => 'Travel name'
        ]);
        $response->assertStatus(422);
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels',[
            'name' => 'Travel name',
            'is_public' => 1,
            'description' => 'some description',
            'number_of_days' => 5
        ]);
        $response->assertStatus(201);
        $response = $this->get('api/v1/travels');
        $response->assertJsonFragment(['name' =>'Travel name']);

    }


}
