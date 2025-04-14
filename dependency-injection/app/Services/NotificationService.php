<?php

namespace App\Services;

class NotificationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    function send($message, $recipient) {
        return "Notification sent to {$recipient} with message : {$message}";
    }
}
