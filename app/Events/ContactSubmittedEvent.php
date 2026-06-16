<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // 🟢 এটি অবশ্যই implements করতে হবে
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContactSubmittedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $email;


    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }


    public function broadcastOn()
    {
        return new Channel('admin-notification-channel');
    }


    public function broadcastAs()
    {
        return 'new-contact-submit';
    }
}
