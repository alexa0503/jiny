<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use App\Listeners\UploadListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ImageWasUploaded::class => [
            UploadListener::class,
        ],
    ];
    // protected $subscribe = [
    //     UploadListener::class
    // ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
