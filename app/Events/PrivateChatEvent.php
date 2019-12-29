<?php

namespace App\Events;

use Illuminate\Support\Facades\Auth;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PrivateChatEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
	 public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
		$user = Auth::user();
		if((int) $user->id === (int) $this->message['sender_id'])
			return new PrivateChannel('Chat.'.$this->message['receiver_id']);
    }
	/*
	* Defines channel name
	*/
	/**
	 * Get the data to broadcast.
	 *
	 * @return array
	 */
	public function broadcastWith() {
		return $this->message;
	}
}