<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegisterdNotification extends Notification
{
    use Queueable;

    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'message' => 'New User Registerd Called' . $this->user->name
        ];
    }
}
