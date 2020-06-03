<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordDeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A delete record feature test.
     *
     * @return void
     */
    public function testRecordDeleteApiSuccessResponse()
    {
        factory(User::class, 1)->create();

        $response = $this->delete('/api/records/1');

        $response->assertStatus(200);

        $response->assertJson([
            'status' => 'success',
            'data' => null
        ]);
    }
}
