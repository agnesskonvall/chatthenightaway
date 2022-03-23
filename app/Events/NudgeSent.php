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
use Illuminate\Broadcasting\InteractsWithBroadcasting;

class NudgeSent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
    use InteractsWithBroadcasting;

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    // This just broadcasts info about the user via pusher, just to broadcast something
    public function __construct(User $user)
    {
        $this->user = $user;
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
