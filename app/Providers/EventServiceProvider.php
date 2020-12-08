<?php

namespace App\Providers;

use App\Events\ActivationEvent;
use App\Listeners\ActivationListener;
use App\Listeners\AdminListener;
use App\Listeners\RegisterNewsletterListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ActivationEvent::class => [
            ActivationListener::class,
            RegisterNewsletterListener::class,
            AdminListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
