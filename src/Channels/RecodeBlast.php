<?php

namespace Bageur\Artikel\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class RecodeBlast
{
    public function send ($notifiable, Notification $notification) {
                $message  = $notification->toBlast($notifiable);
                $data = config('bageur.auth.artikel_blast')::get();
                foreach ($data as $key => $value) {
                    // Mail::to('404.ginda@gmail.com')
                    //         ->queue(new \Bageur\Artikel\Mail\Blast($message['data']));
                    Mail::to($notifiable->email)
                            ->queue(new \Bageur\Artikel\Mail\Blast($message['data']));
                }
    }
}