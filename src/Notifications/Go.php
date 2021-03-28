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
        $urldetail = 'https://lite.midiatama.co.id/artikel/'.$this->artikel->judul_seo;
        $konten    = "*".$this->artikel->judul."*\n\n";
        $konten    .= $this->artikel->text_limit;
        if(empty($this->artikel->gambar)){
            return TelegramMessage::create()
                                ->content($konten)
                                ->button('Lihat Detail', $urldetail);
        }else{
            $img = 'https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_1MB.jpg';
            if(env('APP_ENV') != 'local'){
                $img = $this->artikel->avatar;
            }
            return TelegramFile::create()
                                ->content($konten)
                                ->photo($img)
                                ->button('Lihat Detail', $urldetail);
        }
    }
}