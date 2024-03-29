<?php

declare(strict_types=1);

namespace Termyn\SmartReply\Test\Http\HttpHeader;

use PHPUnit\Framework\TestCase;
use Termyn\SmartReply\Http\Charset\UnicodeCharset;
use Termyn\SmartReply\Http\HttpHeader\ContentTypeHttpHeader;
use Termyn\SmartReply\Http\MimeType\TextMimeType;

final class ContentTypeTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testItContainsValidHttpHeader(ContentTypeHttpHeader $httpHeader, string $expectedValue): void
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
                'httpHeader' => new ContentTypeHttpHeader(TextMimeType::from($mimeType), UnicodeCharset::from($charset)),
                'expectedValue' => sprintf('%s; charset=%s', $mimeType, $charset),
            ];
        }
    }
}
