<?php

namespace App\Events;

use App\Models\Interaction;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InteractionEndedForAnimatorEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $interaction;

    public $answers;

    public $rewards;

    /**
     * Create a new event instance.
     */
    public function __construct(Interaction $interaction, $answers, $rewards)
    {
        $this->interaction = $interaction;
        $this->answers = $answers;
        $this->rewards = $rewards;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('interactions.animator.'.$this->interaction->animator_id);
    }
}
