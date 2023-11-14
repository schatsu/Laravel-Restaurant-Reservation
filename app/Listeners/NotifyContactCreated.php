<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use App\Jobs\NotifyContactCreatedJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyContactCreated
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
    public function handle(ContactCreated $event): void
    {
        $contactForm = $event->contactForm;
//        $user = $contactForm->name;
        $phone = $contactForm->phone;
        $message = $contactForm->message;

        $details = compact('phone','message');

        NotifyContactCreatedJob::dispatch($contactForm,$details);
    }
}
