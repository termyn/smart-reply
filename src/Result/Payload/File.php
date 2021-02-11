<?php

declare(strict_types=1);

namespace Tuzex\Responder\Result\Payload;

use Assert\Assertion;
use Tuzex\Responder\Http\HttpStatusCode;
use Tuzex\Responder\Result;
use Tuzex\Responder\Result\HttpConfig;

abstract class File extends Result
{
    private string $filePath;
    private string $fileName;

    protected function __construct(string $filePath, string $fileName, HttpConfig $httpConfig)
    {
        Assertion::endsWith($filePath, $this->fileExtension());
        Assertion::endsWith($fileName, $this->fileExtension());

        $this->filePath = $filePath;
        $this->fileName = $fileName;

        parent::__construct($httpConfig);
    }

    abstract public static function download(string $filePath, string $fileName, int $statusCode = HttpStatusCode::OK): self;

    abstract public static function display(string $filePath, string $fileName, int $statusCode = HttpStatusCode::OK): self;

    public function filePath(): string
    {
        return $this->filePath;
    }

    public function fileName(): string
    {
        return $this->fileName;
    }

    abstract public function fileMimeType(): string;

    abstract protected function fileExtension(): string;
}
