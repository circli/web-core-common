<?php declare(strict_types=1);

namespace Circli\WebCore\Common\Payload;

use Circli\WebCore\DomainStatus;
use Circli\WebCore\Exception\MessageCodeAware;
use PayloadInterop\DomainPayload;

final class InvalidArgumentPayload implements DomainPayload
{
    public function __construct(
        private \InvalidArgumentException $exception,
    ) {}

    public function getStatus(): string
    {
        return DomainStatus::FAILURE;
    }

    public function getResult(): array
    {
        $result = [
            'messages' => $this->exception->getMessage(),
        ];
        if ($this->exception instanceof MessageCodeAware) {
            $result['code'] = $this->exception->getMessageCode();
        }
        return $result;
    }
}
