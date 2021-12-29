<?php

namespace Wamb\TaggingBundle\Exception;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }

    public function onKernelException(ExceptionEvent $event)
    {
        // GetNews exception object from the received event
        $exception = $event->getThrowable();
        //If isn't an Exception's instance will return
        if (!$exception instanceof \Exception){
            return;
        }

        $exceptionCode = $exception->getCode() === 0 ? 500 : $exception->getCode();

        $customResponse = new JsonResponse(['data' => $exception->getMessage()],  $exceptionCode);
        $customResponse->headers->set('Content-Type', 'application/json');
        $event->setResponse($customResponse);

    }
}