<?php

declare(strict_types=1);

namespace Termyn\SmartReply\Http\MimeType;

use Termyn\SmartReply\Http\MimeType;

enum VideoMimeType: string implements MimeType
{
    case AVI = 'video/x-msvideo';
    case MP4 = 'video/mp4';
    case MPEG = 'video/mpeg';
    case OGV = 'video/ogg';
    case WEBM = 'video/webm';

    public function value(): string
    {
        return $this->value;
    }
}
