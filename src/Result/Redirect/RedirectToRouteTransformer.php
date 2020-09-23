<?php

declare(strict_types=1);

namespace Tuzex\Symfony\Responder\Result\Redirect;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGenerator;
use Tuzex\Symfony\Responder\Bridge\Symfony\Response\RedirectResponseFactory;
use Tuzex\Symfony\Responder\Exception\UnsupportedResultException;
use Tuzex\Symfony\Responder\Result\Result;
use Tuzex\Symfony\Responder\Result\ResultTransformer;

final class RedirectToRouteTransformer implements ResultTransformer
{
    private UrlGenerator $urlGenerator;
    private RedirectResponseFactory $redirectResponseFactory;

    public function __construct(UrlGenerator $urlGenerator, RedirectResponseFactory $redirectResponseFactory)
    {
        $this->urlGenerator = $urlGenerator;
        $this->redirectResponseFactory = $redirectResponseFactory;
    }

    public function supports(Result $result): bool
    {
        return $result instanceof RedirectToRoute;
    }

    /**
     * @param RedirectToRoute $result
     */
    public function transform(Result $result): RedirectResponse
    {
        if (!$this->supports($result)) {
            throw new UnsupportedResultException($result, self::class);
        }

        $url = $this->urlGenerator->generate($result->getName(), $result->getParameters());

        return $this->redirectResponseFactory->create($url, $result->getHttpConfigs());
    }
}
