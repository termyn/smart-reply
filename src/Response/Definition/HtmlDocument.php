<?php

declare(strict_types=1);

namespace Tuzex\Responder\Response\Definition;

use Tuzex\Responder\Http\Header\ContentType;
use Tuzex\Responder\Http\HttpStatusCode;
use Tuzex\Responder\Http\MimeType;
use Tuzex\Responder\Response\HttpConfig;

final class HtmlDocument extends Text
{
    public static function define(string $html): self
    {
        $httpConfig = HttpConfig::set(HttpStatusCode::OK, [
            new ContentType(MimeType::HTML),
        ]);

        return new self($html, $httpConfig);
    }
}