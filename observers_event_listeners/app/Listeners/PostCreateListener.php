<?php

namespace App\Listeners;

use App\Events\PostCreateEvent;
use App\Mail\PostCreateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // dd("dd from listener");
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreateEvent $event): void
    {
        // direkt bu yakalar eventteki parametreyi bu şekil harika framework cidden laravel
        dd("hello",$event->name);
        Mail::to($event->mail)->send(new PostCreateMail());
    }
}
