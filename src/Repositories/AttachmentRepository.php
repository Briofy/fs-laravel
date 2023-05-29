<?php

namespace Briofy\FileSystem\Repositories;

use Briofy\FileSystem\Models\Attachment;
use Briofy\RepositoryLaravel\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class AttachmentRepository extends AbstractRepository implements IAttachmentRepository
{
    protected function instance(array $attributes = []): Model
    {
        return new Attachment();
    }
}
