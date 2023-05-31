<?php

namespace Briofy\FileSystem\Models;

use Database\Factories\AttachmentFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'disk',
        'path',
        'type',
    ];

    protected $hidden = ['pivot'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('briofy-filesystem.attachments.db_connection'));
    }

    protected static function newFactory()
    {
        return AttachmentFactory::new();
    }

    public function attachmentables(): HasMany
    {
        return $this->hasMany(Attachmentable::class);
    }
}
