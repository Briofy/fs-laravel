<?php

namespace Briofy\FileSystem\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileSystem
{
    public function upload(UploadedFile $file, string $disk, string $directory): string
    {
        $fileName = Str::uuid()->toString().'.'.$file->extension();
        $path = Str::endsWith($directory, '/') ? $directory.$fileName : $directory.'/'.$fileName;
        Storage::disk($disk)->put($path, file_get_contents($file));

        return $path;
    }

    /**
     * @throws \Exception
     */
    public function link(string $disk, string $path, bool $signed): string
    {
        if (Storage::disk($disk)->exists($path)) {
            return $signed
                ? Storage::disk($disk)
                    ->temporaryUrl($path, now()->addMinutes(config('briofy-filesystem.attachments.temporary_url_ttl')))
                : Storage::disk($disk)->url($path);
        }

        throw new \Exception('File not found!');
    }
}
