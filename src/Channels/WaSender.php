<?php

namespace Bageur\Artikel\Channels;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class WaSender
{
    public function send($notifiable, Notification $notification) {
            $message  = $notification->toWaSender($notifiable);
            $response = Http::withHeaders([
                                    'apikey' => 'RYTx8xm4'
                                ])->post('https://wa.bageur.xyz/api/sendText', [
                                        'id_device' => '22',
                                        'message' => $message['pesan'],
                                        'tujuan' => format_nohp($message['nomor']).'@s.whatsapp.net',
                                ]);

    }
}
