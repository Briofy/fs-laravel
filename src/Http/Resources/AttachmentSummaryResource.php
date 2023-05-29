<?php

namespace Briofy\FileSystem\Http\Resources;

use Briofy\FileSystem\Jobs\GetAttachmentLinkJob;
use Illuminate\Http\Resources\Json\JsonResource;

class AttachmentSummaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'link' => dispatch_sync(new GetAttachmentLinkJob($this->disk, $this->path)),
            'type' => $this->type,
        ];
    }
}
