<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Facades\URL;

class customNotifyEmail extends BaseVerifyEmail implements ShouldQueue
{
    use Queueable;

    public $tries = 5;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

    /**
     * Get the mail representation of the notification.
     */

    public function toMail($notifiable){

        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Please Confirm Your Email Address')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Thank you for registering! Please confirm your email to get started.')
            ->action('Verify Email', $verificationUrl)
            ->line('If you did not create an account, no further action is required. This verification link expires in 10 minutes.');
    }


     protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', 
            Carbon::now()->addMinutes(10), 
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }
    
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
