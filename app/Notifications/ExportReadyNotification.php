<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ExportReadyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $fileName,
        public string $downloadUrl
    ) {}

    public function via($notifiable)
    {
        return ['mail']; // Bisa ditambah 'database' untuk notifikasi web
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('✅ Laporan Excel Siap Didownload')
            ->line('Laporan transaksi Anda sudah berhasil dibuat.')
            ->action('Download Laporan', $this->downloadUrl)
            ->line('File akan tersimpan selama 7 hari.');
    }
}
