<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w, $h, $fileName, $path;
    
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . "/app/public/" . $this->path . "/" . $this->fileName;
        $destPath = storage_path() . "/app/public/" . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
            ->crop($w, $h, CropPosition::Center)
            ->watermark(
                base_path('public\storage\img\watermark.png'),
                width: 50,
                height: 50,
                paddingX: 5,
                paddingY: 5,
                paddingUnit: Unit::Percent
            )
            ->save($destPath);

    }

    
}
