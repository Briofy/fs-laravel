<?php

namespace Briofy\FileSystem\Traits;

use Briofy\FileSystem\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasAttachments
{
    public function attachments(): MorphToMany
    {
        return $this->morphToMany(Attachment::class, 'attachmentable')->withTimestamps();
    }
}
