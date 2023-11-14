<?php

namespace App\Jobs;

use App\Notifications\ReservationCanceledNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Expr\Array_;

class NotifyReservationCanceledJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;


    /**
     * Create a new job instance.
     */
    public function __construct(public $reservation, public Array $details)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::send($this->reservation,new ReservationCanceledNotification($this->details));
    }
}
