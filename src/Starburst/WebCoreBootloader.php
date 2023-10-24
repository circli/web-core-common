<?php declare(strict_types=1);

namespace Circli\WebCore\Starburst;

use Circli\WebCore\Common\Responder\ApiResponder;
use Starburst\Contracts\Bootloader;
use Starburst\Contracts\Extensions\DefinitionProvider;
use Stefna\DependencyInjection\Definition\DefinitionArray;
use Stefna\DependencyInjection\Definition\DefinitionSource;

final class WebCoreBootloader implements Bootloader, DefinitionProvider
{

    public function createDefinitionSource(): DefinitionSource
    {
        return new DefinitionArray([
            ApiResponder::class => fn () => new ApiResponder(),
        ]);
    }
}
