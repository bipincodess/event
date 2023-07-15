<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models\Event;

class EventTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function an_event_can_be_added(){
        $data = [
            'title' => 'Test Event',
            'description' => 'This is a description',
            'start_date' => '2023-07-15 05:00:00',
            'end_date' => '2023-07-17 05:00:00',
        ];
        $event = new Event;
        $newEvent = $event->add_data($data);
        $this->assertTrue($newEvent['status']); 
    }

    /** @test */
    public function an_event_can_be_edited(){
        $data = [
            'title' => 'Test Event',
            'description' => 'This is a description',
            'start_date' => '2023-07-15 05:00:00',
            'end_date' => '2023-07-17 05:00:00',
        ];
        $event = new Event;
        $newEvent = $event->add_data($data);

        $newData = [
            'title' => 'Test Event Edited',
            'description' => 'This is a description that is edited',
            'start_date' => '2023-07-16 06:00:00',
            'end_date' => '2023-07-18 06:00:00',
        ];
        $update = $event->update_data($newEvent['id'],$newData);
        $this->assertTrue($update); 
    }

    /** @test */
    public function an_event_can_be_deleted(){
        $data = [
            'title' => 'Test Event',
            'description' => 'This is a description',
            'start_date' => '2023-07-15 05:00:00',
            'end_date' => '2023-07-17 05:00:00',
        ];
        $event = new Event;
        $newEvent = $event->add_data($data);

        $delete = $event->delete_data($newEvent['id']);
        $this->assertTrue($delete); 
    }
}
