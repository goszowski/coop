<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewRegisterActivation extends Notification
{
    use Queueable;

    protected $userData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Нова реєстрація '.date('Y.m.d H:i').' - '.$this->userData['name'])
                    ->line('Підтвердіть реєстрацію')
                    ->line($this->userData['name'].' '.$this->userData['email'])
                    ->action('Підтвердити', route('api.users.activate', ['email'=>$this->userData['email'], 'token'=>$this->userData['register_token']]))
                    ->line('Дякуємо за користування нашою програмою!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
