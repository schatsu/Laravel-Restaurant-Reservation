<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;


class ReservationCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public array $details)
    {
        //
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
    public function toMail(object $notifiable): MailMessage
    {
        $formattedDate = Carbon::parse($this->details['date'])->translatedFormat("d F Y l");
        $formattedTime = Carbon::parse($this->details['time'])->format('H:i');
        return (new MailMessage)
            ->subject('Rezervasyonunuz oluşturulmuştur')
            ->greeting("Sayın {$notifiable->name}")
            ->line("{$formattedDate} günü saat {$formattedTime}'de ki rezervasyonunuz oluşturulmuştur.")
            ->action('Menümüzü inceleyin.', route('menu'))
            ->line('Bizi tercih ettiğiniz için teşekkürler!');
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
