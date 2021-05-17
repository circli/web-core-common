<?php declare(strict_types=1);

namespace Circli\WebCore\Common\Payload;

use Circli\WebCore\DomainStatus;
use Circli\WebCore\Exception\NotFoundInterface;
use PayloadInterop\DomainPayload;

final class NotFoundPayload implements DomainPayload
{
    public function __construct(
        private NotFoundInterface $notFound,
    ) {}

    public function getStatus(): string
    {
        return DomainStatus::NOT_FOUND;
    }

    public function getResult(): array
    {
        return [
            'messages' => $this->notFound->getMessage(),
            'code' => 'NOT_FOUND',
        ];
    }
}
