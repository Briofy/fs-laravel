<?php

namespace Briofy\FileSystem\Jobs;

use Briofy\FileSystem\Repositories\IAttachmentRepository;
use Briofy\FileSystem\Traits\FileSystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreAttachmentJob
{
    use Dispatchable, SerializesModels, FileSystem;

    public function __construct(
        private array $data,
        private string|int $userId,
        private string $disk,
        private string $directory,
    ) {
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(IAttachmentRepository $attachmentRepository)
    {
        return $attachmentRepository->create([
            'user_id' => $this->userId,
            'disk' => $this->disk,
            'path' => $this->upload($this->data['file'], $this->disk, $this->directory),
            'type' => $this->data['type'],
        ]);
    }
}
