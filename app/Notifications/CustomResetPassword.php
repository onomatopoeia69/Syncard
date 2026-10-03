<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;


     public $token;

    /**
     * Create a new notification instance.
     */
    
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */

     
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Your Password')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Click the button below to reset your password.')
            ->action('Reset Password', url("password/reset/{$this->token}"))
            ->line('If you did not request this, no action is needed.');
    }

    
   
}
