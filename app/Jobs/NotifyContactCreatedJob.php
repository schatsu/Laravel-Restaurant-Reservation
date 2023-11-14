<?php

namespace App\Jobs;

use App\Notifications\ContactCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NotifyContactCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $contactForm , public array $details)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Notification::route('mail','test@example.com')
        ->notify(new ContactCreatedNotification($this->details));
    }
}
