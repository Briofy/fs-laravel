<?php

namespace Briofy\FileSystem\Models;

use Database\Factories\AttachmentFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected static function newFactory()
    {
        return AttachmentFactory::new();
    }
}
