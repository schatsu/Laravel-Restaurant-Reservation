<?php

namespace App\Listeners;

use App\Events\ReservationCanceled;
use App\Jobs\NotifyReservationCanceledJob;
use App\Notifications\ReservationCanceledNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class NotifyReservationCanceled
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
    public function handle(ReservationCanceled $event): void
    {
        $reservation = $event->reservation;

        $name = $reservation->name;
        $email = $reservation->email;
        $date = $reservation->date;
        $time = $reservation->time;

        $details = compact('name','email','date','time');

        NotifyReservationCanceledJob::dispatch($reservation,$details);

    }
}
