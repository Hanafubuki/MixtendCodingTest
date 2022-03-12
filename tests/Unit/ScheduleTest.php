<?php

namespace Tests\Unit;

use Tests\TestCase;

class ScheduleTest extends TestCase
{
    
    public function test_schedule_return_correct_data()
    {
        $this->json('GET', 'api/schedule')
            ->assertStatus(200)
            ->assertJsonStructure([
                'working_hours' => [
                    'start',
                    'end'
                ],
                'meetings' => [],
            ]);
    }
}
