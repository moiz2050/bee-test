<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordUpdateTest extends TestCase
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

        $response = $this->put('/api/records/1', [
            'title' => 'Wakiaa',
            'artist' => 'Shakira',
            'genre' => 'pop'
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Wakiaa');
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
}
