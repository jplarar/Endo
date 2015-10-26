<?php

namespace EndoBundle\EventListener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


/**
 * Adds CORS headers and handles pre-flight requests
 */
class CorsListener
{
    /** @var EventDispatcherInterface $dispatcher */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $request = $event->getRequest();

        // skip if not a CORS request
        if (!$request->headers->has('Origin') || $request->headers->get('Origin') == $request->getSchemeAndHttpHost()) {
            return;
        }

        // perform preflight checks
        if ('OPTIONS' === $request->getMethod()) {
            $event->setResponse($this->getPreflightResponse($request));
            return;
        }

        $this->dispatcher->addListener('kernel.response', array($this, 'onKernelResponse'));
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $response = $event->getResponse();
        $request = $event->getRequest();

        // add CORS response headers
        $response->headers->set('Access-Control-Allow-Origin', $request->headers->get('Origin'));
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'content-type, x-authorization');
        $response->headers->set('Access-Control-Max-Age', '1728000');
    }

    protected function getPreflightResponse(Request $request)
    {
        $response = new JsonResponse();
        $response->headers->set('Access-Control-Allow-Origin', $request->headers->get('Origin'));
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'content-type, x-authorization');
        $response->headers->set('Access-Control-Max-Age', '1728000');
        return $response;
    }
}