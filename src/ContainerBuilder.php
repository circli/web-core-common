<?php declare(strict_types=1);

namespace Circli\WebCore;

use DI\ContainerBuilder as DiContainerBuilder;

abstract class ContainerBuilder extends \Circli\Core\ContainerBuilder
{
    protected function initDefinitions(DiContainerBuilder $builder, string $defaultDefinitionPath): void
    {
        $builder->addDefinitions($defaultDefinitionPath . '/adr.php');
    }
}
