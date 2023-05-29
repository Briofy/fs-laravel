<?php

namespace Briofy\FileSystem\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttachmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->id,
            'type' => $this->type,
        ];
    }
}
