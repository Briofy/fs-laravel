<?php

namespace Briofy\FileSystem\Traits;

use Briofy\FileSystem\Models\Attachmentable;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAttachments
{
    public function attachmentables(): MorphMany
    {
        return $this->morphMany(Attachmentable::class, 'attachmentable');
    }
}
