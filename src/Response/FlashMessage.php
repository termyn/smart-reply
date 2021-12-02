<?php

declare(strict_types=1);

namespace Tuzex\Responder\Response;

final class FlashMessage
{
    public function __construct(
        public readonly string $type,
        public readonly string $message
    ) {}
}
