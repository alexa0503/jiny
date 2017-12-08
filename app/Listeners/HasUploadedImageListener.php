<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use Image;

class HasUploadedImageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ImageWasUploaded $event)
    {
        $path = $event->path();
        //var_dump(public_path($path));
        //your code, for example resizing and cropping
        $img = Image::make($path);
        $img->insert(public_path('images/mask.png'), 'bottom-left', 10, 10);
        $img->save($path);
    }
}
