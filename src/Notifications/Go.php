<?php

namespace Bageur\Artikel\notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Go extends Notification
{
    use Queueable;

    public function __construct($artikel)
    {
        $this->artikel = $artikel;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $urldetail = config('bageur.auth.fe_url').$this->artikel->judul_seo;
        $konten    = "*".$this->artikel->judul."*\n\n";
        $konten    .= $this->artikel->text_limit;
        if(empty($this->artikel->gambar) || ENV('APP_ENV') == 'local'){
            return TelegramMessage::create()
                                ->content($konten)
                                ->button('Lihat Detail', $urldetail);
        }else{
            return TelegramFile::create()
                                ->content($konten) 
                                ->file('storage/artikel/'.$this->artikel->gambar, 'photo')
                                ->button('Lihat Detail', $urldetail);
        }
    }
}
