<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QueueApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_pending_jobs_count()
    {
        // Assuming you have a way to add jobs to the queue in your test
        // Add some jobs here

        $response = $this->getJson('/api/queue/pending');

        $response->assertStatus(200)
                 ->assertJsonStructure(['pending_jobs']);
    }
}
