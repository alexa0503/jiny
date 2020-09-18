<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use Image;

class UploadListener
{


    public function handle($event)
    {
        \Log::info("12345");
        $method = 'on' . class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();
        //your code, for example resizing and cropping
    }


    // public function onImageWasRenamed(ImageWasRenamed $event)
    // {
    //     // image was renamed
    // }

    // public function onImageWasDeleted(ImageWasDeleted $event)
    // {
    //     // image was deleted
    // }

    // public function onFolderWasRenamed(FolderWasRenamed $event)
    // {
    //     // folder was renamed
    // }
}
