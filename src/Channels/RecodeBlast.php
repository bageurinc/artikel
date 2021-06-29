<?php

namespace Bageur\Artikel\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class RecodeBlast
{
    public function send ($notifiable, Notification $notification) {
        try {
                $message  = $notification->toBlast($notifiable);
                $data = config('bageur.auth.artikel_blast')::limit(3)->get();
                foreach ($data as $key => $value) {
                    // Mail::to('404.ginda@gmail.com')
                    //         ->queue(new \Bageur\Artikel\Mail\Blast($message['data']));
                    Mail::to($value->email)
                            ->queue(new \Bageur\Artikel\Mail\Blast($message['data']));
                }
        } catch (\Throwable $th) {
            \Log::error($th);
        }
    }
}