<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Travel;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTravelTest extends TestCase
{
   use RefreshDatabase;
    public function test_public_user_cannot_adding_travels(): void
    {

        $response = $this->postJson('/api/v1/admin/travels');

        $response->assertStatus(401);
    }
    public function test_non_admin_user_cannot_adding_travels(): void
    {
        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'editor')->value('id'));
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels', [
            'name' => 'Travel name'
        ]);
        $response->assertStatus(403);
    }
    public function test_saves_travels_with_valid_data(): void
    {
        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name','admin')->value('id'));
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels', [
            'name' => 'Travel name'
        ]);
        $response->assertStatus(422);
        $response = $this->actingAs($user)->postJson('/api/v1/admin/travels', [
            'name' => 'Travel name',
            'is_public'=> 1,
            'description' => 'description travel',
            'number_of_days' => 5
        ]);
        $response->assertStatus(201);
        $response = $this->get('api/v1/travels');
        $response->assertJsonFragment(['name' => 'Travel name']);
    }
    public function test_update_travels_with_valid_data(): void
    {
        $this->seed(RoleSeeder::class);
        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name','admin')->value('id'));
        $travel = Travel::factory()->create();
        $response = $this->actingAs($user)->putJson('/api/v1/admin/travels/'.$travel->id, [
            'name' => 'Travel name'
        ]);
        $response->assertStatus(422);
        $response = $this->actingAs($user)->putJson('/api/v1/admin/travels/'.$travel->id, [
            'name' => 'Travel name updated',
            'is_public'=> 1,
            'description' => 'description travel',
            'number_of_days' => 5
        ]);
        $response->assertStatus(200);
        $response = $this->get('api/v1/travels');
        $response->assertJsonFragment(['name' => 'Travel name updated']);
    }
}
