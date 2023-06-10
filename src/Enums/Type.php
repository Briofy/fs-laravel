<?php

namespace Briofy\FileSystem\Enums;

use Briofy\RepositoryLaravel\Traits\EnumTrait;

enum Type: int
{
    use EnumTrait;

    case IMAGE = 11001;
    case VIDEO = 11002;
    case AUDIO = 11003;
    case GIF = 11004;
    case FILE = 11005;
    case DOCUMENT = 11006;
    case OTHER = 11007;
}
