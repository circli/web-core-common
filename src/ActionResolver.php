<?php declare(strict_types=1);

namespace Circli\WebCore;

use Polus\Adr\Interfaces\Resolver;
use Polus\Adr\Interfaces\Responder;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ActionResolver implements Resolver
{
    public function __construct(
        private ContainerInterface $container,
    ) {}

    public function resolve(?string $class): callable
    {
        try {
            return $this->container->get((string)$class);
        }
        catch (NotFoundExceptionInterface $e) {
            if (\is_string($class) && class_exists($class)) {
                return new $class();
            }
        }
        throw new class extends \RuntimeException implements NotFoundExceptionInterface {};
    }

    public function resolveResponder(?string $responder): Responder
    {
        $responder = $this->resolve($responder);
        if (!$responder instanceof Responder) {
            throw new class extends \RuntimeException implements NotFoundExceptionInterface {};
        }
        return $responder;
    }
}
