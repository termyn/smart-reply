<?php

declare(strict_types=1);

namespace Tuzex\Responder\Test\Http\HttpHeader;

use PHPUnit\Framework\TestCase;
use Tuzex\Responder\Http\Charset\UnicodeCharset;
use Tuzex\Responder\Http\HttpHeader\ContentType;
use Tuzex\Responder\Http\MimeType\TextMimeType;

final class ContentTypeTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testItContainsValidHttpHeader(ContentType $httpHeader, string $expectedValue): void
    {
        $this->assertSame('Content-Type', $httpHeader->name());
        $this->assertSame($expectedValue, $httpHeader->value());
    }

    public function provideTestData(): iterable
    {
        $data = [
            'text/plain' => 'UTF-8',
            'text/html' => 'UTF-16',
        ];

        foreach ($data as $mimeType => $charset) {
            yield $mimeType => [
                'httpHeader' => new ContentType(TextMimeType::from($mimeType), UnicodeCharset::from($charset)),
                'expectedValue' => sprintf('%s; charset=%s', $mimeType, $charset),
            ];
        }
    }
}