<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A create record feature test example.
     *
     * @return void
     */
    public function testRecordCreateApiSuccessResponse()
    {
        factory(User::class, 1)->create();

        $response = $this->post('/api/records/create', [
            'title' => 'Wakaaa',
            'artist' => 'Shakira',
            'genre' => 'pop'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'artist',
                    'genre',
                    'created_at',
                    'updated_at',
                    'shop_id'
                ]
            ]
        ]);
    }

    /**
     * A create record validation test.
     *
     * @return void
     */
    public function testRecordCreateApiValidationFailedResponse()
    {
        factory(User::class, 1)->create();

        $response = $this->post('/api/records/create', [
            'title' => 'Wakaaa',
            'genre' => 'pop'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'status' => 'fail',
            'data' => ['artist' => ["The artist field is required."]]
        ]);
    }
}
