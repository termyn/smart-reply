<?php

declare(strict_types=1);

namespace Tuzex\Responder\Response\Resource\Payload;

use Tuzex\Responder\Http\Charset;
use Tuzex\Responder\Http\Charset\UnicodeCharset;
use Tuzex\Responder\Http\HttpHeader\ContentType;
use Tuzex\Responder\Http\MimeType\TextMimeType;
use Tuzex\Responder\Http\StatusCode;
use Tuzex\Responder\Response\Resource;
use Tuzex\Responder\Response\Resource\Text;

final class PlainText extends Resource implements Text
{
    public function __construct(
        private string $content,
        StatusCode $statusCode = StatusCode::OK,
        Charset $charset = UnicodeCharset::UTF8,
    ) {
        parent::__construct($statusCode, new ContentType(TextMimeType::PLAIN, $charset));
    }

    public function content(): string
    {
        return $this->content;
    }
}
