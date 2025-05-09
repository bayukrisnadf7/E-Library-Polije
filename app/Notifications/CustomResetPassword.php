<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    public $token;

    /**
     * Constructor menerima token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Kirim lewat email
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Kirim isi email kustom
     */
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Reset Password - UPA Perpustakaan Polije')
            ->greeting('Halo!')
            ->line('Kami menerima permintaan untuk mengatur ulang kata sandi Anda.')
            ->action('Atur Ulang Kata Sandi', $url)
            ->line('Link ini akan kedaluwarsa dalam 60 menit.')
            ->line('Jika Anda tidak meminta pengaturan ulang, abaikan email ini.')
            ->salutation('Salam, UPA Perpustakaan');
    }
}
