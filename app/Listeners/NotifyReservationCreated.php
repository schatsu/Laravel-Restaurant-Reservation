<?php

namespace App\Listeners;

use App\Events\ReservationCreated;
use App\Mail\ReservationMail;
use App\Notifications\ReservationCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;




class NotifyReservationCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCreated $event): void
    {
        $reservation = $event->reservation;

        $user = $event->reservation->name;
        $date = $event->reservation->date;
        $time = $event->reservation->time;

        $details = compact('user','date','time');
        \App\Jobs\NotifyReservationCreatedJob::dispatch($reservation,$details);
    }
}
