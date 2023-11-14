<?php

namespace App\Providers;

use App\Events\ContactCreated;
use App\Events\ReservationCreated;
use App\Events\ReservationCanceled;
use App\Listeners\NotifyContactCreated;
use App\Listeners\NotifyReservationCreated;
use App\Listeners\NotifyReservationCanceled;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReservationCreated::class => [
            NotifyReservationCreated::class,
        ],
        ReservationCanceled::class => [
            NotifyReservationCanceled::class,
        ],
        ContactCreated::class => [
          NotifyContactCreated::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}