<?php

declare(strict_types=1);

namespace Tuzex\Responder\Response\Definition;

use Tuzex\Responder\Response\HttpConfig;
use Tuzex\Responder\Response\ResponseDefinition;

abstract class Text extends ResponseDefinition
{
    protected function __construct(
        private string $body,
        HttpConfig $httpConfig
    )
    {
        parent::__construct($httpConfig);
    }

    public function body(): string
    {
        return $this->body;
    }
}
