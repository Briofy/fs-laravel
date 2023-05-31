<?php

namespace Briofy\FileSystem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachmentable extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'attachment_id',
        'attachmentable_type',
        'attachmentable_id',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('briofy-filesystem.attachments.db_connection'));
    }

    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class);
    }

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
