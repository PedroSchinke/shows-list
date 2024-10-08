<?php

namespace App\Providers;

use App\Events\SeriesCreated;
use App\Listeners\EmailUserAboutSeriesCreated;
use App\Listeners\LogSeriesCreated;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Observers\EpisodeObserver;
use App\Observers\SeasonObserver;
use App\Observers\SeriesObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SeriesCreated::class => [
            EmailUserAboutSeriesCreated::class,
            LogSeriesCreated::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Series::observe(SeriesObserver::class);
        Season::observe(SeasonObserver::class);
        Episode::observe(EpisodeObserver::class);
    }
}
