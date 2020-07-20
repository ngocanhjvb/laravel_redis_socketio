<?php

namespace App\Events;

use App\Models\Chat;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chats;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chat $chats)
    {
        $this->chats = $chats;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('channel-name');
        return $this->chats;
    }

    public function broadcastAs()
    {
//        return new PrivateChannel('channel-name');
        return "message";
    }
}
