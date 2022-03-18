<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithBroadcasting;

class MessageDeleted implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
    use InteractsWithBroadcasting;

    public $user;
    public $deleted;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, int $deleted)
    {
        $this->user = $user;
        $this->message = $deleted;
        $this->broadcastVia('pusher');
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chatroom');
    }
}
