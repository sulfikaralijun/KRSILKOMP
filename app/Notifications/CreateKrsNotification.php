<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateKrsNotification extends Notification
{
    use Queueable;

    protected $kajurId;
    protected $dosenId;
    protected $pengajuanId;

    /**
     * Create a new notification instance.
     */
    public function __construct($kajurId, $dosenId, $pengajuanId)
    {
        $this->kajurId = $kajurId;
        $this->dosenId = $dosenId;
        $this->pengajuanId = $pengajuanId;
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
        return (new MailMessage)
                    ->subject('Pengajuan KRS Baru')
                    ->greeting('Hello, ' . $notifiable->name)
                    ->line('Anda telah berhasil membuat pengajuan KRS baru.')
                    ->action('Lihat Pengajuan', url('/pengajuan/' . $this->pengajuanId))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

        ];
    }
}
