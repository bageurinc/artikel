<?php

namespace Bageur\Artikel\notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Go extends Notification implements ShouldQueue
{
    use Queueable;

    public $artikel;
    public function __construct($artikel)
    {
        $this->artikel = $artikel;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class,\Bageur\Artikel\Channels\RecodeBlast::class,\Bageur\Artikel\Channels\WaSender::class];
    }

    public function toBlast($notifiable)
    {
        if ($this->artikel->blast_email == 1) {
            return ['data' => $this->artikel];
        }
    }

    public function toTelegram($notifiable)
    {
        if ($this->artikel->blast_telegram == 1) {
            $urldetail = config('bageur.auth.artikel_url').$this->artikel->judul_seo;
            $konten    = "*".$this->artikel->judul."*\n\n";
            $konten    .= $this->artikel->text_limit;
            if(empty($this->artikel->gambar)){
                return TelegramMessage::create()
                                    ->content($konten)
                                    ->button('Lihat Detail', $urldetail);
            }else{
                return TelegramFile::create()
                                    ->content($konten) 
                                    ->file(storage_path('app/public/artikel/'.$this->artikel->gambar), 'photo')
                                    ->button('Lihat Detail', $urldetail);
            }
        }
    }

    public function toWaSender($notifiable){

        if ($this->artikel->blast_whatsapp == 1) {
            $urldetail = config('bageur.auth.artikel_url').$this->artikel->judul_seo;
            $pesan = "Hi , $notifiable->nama !\n";
            $pesan .= "Ada artikel baru dari midiatama\n\n";
            $pesan .= "*".$this->artikel->judul."*\n";
            $pesan .= "URL : $urldetail";

            return ['nomor'=> $notifiable->hp, 'pesan' => $pesan];
        }
    }
}
