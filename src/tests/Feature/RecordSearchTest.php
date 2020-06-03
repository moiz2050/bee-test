<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A search record feature test.
     *
     * @return void
     */
    public function testRecordSearchApiSuccessResponse()
    {
        factory(User::class, 1)->create();

        $this->post('/api/records/create', [
            'title' => 'Waka Waka',
            'artist' => 'Shakira',
            'genre' => 'pop'
        ]);

        $response = $this->get('/api/records/search?keyword=waka');

        $response->assertStatus(200);

        $response->assertSeeText('Waka Waka');
        $response->assertJsonStructure([
            'status',
            'data' => [
                '*' => [
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
            ]
        ]);
    }

    /**
     * A search record empty test.
     *
     * @return void
     */
    public function testRecordSearchApiEmptyResponse()
    {
        factory(User::class, 1)->create();

        $this->post('/api/records/create', [
            'title' => 'Waka Waka',
            'artist' => 'Shakira',
            'genre' => 'pop'
        ]);

        $response = $this->get('/api/records/search?keyword=chantaje');

        $response->assertStatus(200);

        $response->assertJson([
            'status' => 'success',
            'data' => []
        ]);
    }
}
