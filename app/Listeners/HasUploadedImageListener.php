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

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ImageWasUploaded $event)
    {
        \Log::info('123');
        $path = $event->path();
        $mimetype = exif_imagetype($path);
        if ($mimetype == IMAGETYPE_GIF || $mimetype == IMAGETYPE_JPEG || $mimetype == IMAGETYPE_PNG || $mimetype == IMAGETYPE_BMP) {
            $img = Image::make($path);
            $img->insert(public_path('images/mask.png'), 'bottom-left', 10, 10);
            $img->save($path);
        }
    }
    // public function handle($event)
    // {
    //     $method = 'on' . class_basename($event);
    //     if (method_exists($this, $method)) {
    //         call_user_func([$this, $method], $event);
    //     }
    // }
    // public function onImageWasUploaded(ImageWasUploaded $event)
    // {
    //     $path = $event->path();
    //     $mimetype = exif_imagetype($path);
    //     if ($mimetype == IMAGETYPE_GIF || $mimetype == IMAGETYPE_JPEG || $mimetype == IMAGETYPE_PNG || $mimetype == IMAGETYPE_BMP) {
    //         $img = Image::make($path);
    //         $img->insert(public_path('images/mask.png'), 'bottom-left', 10, 10);
    //         $img->save($path);
    //     }
    // }
}
