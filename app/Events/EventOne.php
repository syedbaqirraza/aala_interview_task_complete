<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EventOne implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $message)
    {
        $this->data = $data;
        $this->message = $message;
        Log::info('event one run');
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-name');
    }
}
