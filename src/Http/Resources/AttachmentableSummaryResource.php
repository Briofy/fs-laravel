<?php

namespace Briofy\FileSystem\Http\Resources;

use Briofy\FileSystem\Jobs\GetAttachmentLinkJob;
use Illuminate\Http\Resources\Json\JsonResource;

class AttachmentableSummaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'link' => dispatch_sync(new GetAttachmentLinkJob($this->attachment->disk, $this->attachment->path)),
            'type' => $this->attachment->type,
        ];
    }
}
