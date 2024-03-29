<?php

declare(strict_types=1);

namespace Termyn\SmartReply\Test\Bridge\HttpFoundation\Request;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Termyn\SmartReply\Bridge\HttpFoundation\Request\RequestAccessor;
use Termyn\SmartReply\Bridge\HttpFoundation\Request\RequestUriProvider;

final class RequestUriProviderTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testItReturnsUri(RequestStack $requestStack, string $expectedUri): void
    {
        $requestAccessor = new RequestAccessor($requestStack);
        $uriProvider = new RequestUriProvider($requestAccessor);

        $this->assertSame($expectedUri, $uriProvider->provide());
    }

    public function provideData(): array
    {
        $host = 'host.com';
        $headers = [
            'only-domain' => [
                'host' => $host,
                'uri' => sprintf('http://%s/', $host),
            ],
        ];

        return array_map(function (array $data): array {
            $request = new Request();
            $request->headers->add([
                'host' => $data['host'],
            ]);

            $requestStack = new RequestStack();
            $requestStack->push($request);

            return [
                'requestStack' => $requestStack,
                'expectedUri' => $data['uri'],
            ];
        }, $headers);
    }
}
