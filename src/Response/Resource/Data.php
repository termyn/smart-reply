<?php

declare(strict_types=1);

namespace Tuzex\Responder\Response\Resource;

use Tuzex\Responder\Http\HttpStatusCode;
use Tuzex\Responder\Response\HttpConfig;
use Tuzex\Responder\Response\ResponseResource;

abstract class Data extends ResponseResource
{
    protected function __construct(
        private iterable $iterable,
        HttpConfig $httpConfig
    )
    {
        parent::__construct($httpConfig);
    }

    abstract public static function set(iterable $iterable, int $statusCode = HttpStatusCode::OK): self;

    public function iterable(): iterable
    {
        return $this->iterable;
    }
}
