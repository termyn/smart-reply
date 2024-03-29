<?php

declare(strict_types=1);

namespace Termyn\SmartReply\Http\Charset;

use Termyn\SmartReply\Http\Charset;

enum UnicodeCharset: string implements Charset
{
    case UTF8 = 'UTF-8';
    case UTF16 = 'UTF-16';
    case UTF32 = 'UTF-32';

    public function value(): string
    {
        return $this->value;
    }
}
