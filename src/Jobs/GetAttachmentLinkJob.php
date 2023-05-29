<?php

namespace Briofy\FileSystem\Jobs;

use Briofy\FileSystem\Traits\FileSystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetAttachmentLinkJob
{
    use Dispatchable, SerializesModels, FileSystem;

    public function __construct(
        private string $disk,
        private string $path,
        private bool $signed = true,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function handle(): string
    {
        return $this->link($this->disk, $this->path, $this->signed);
    }
}
