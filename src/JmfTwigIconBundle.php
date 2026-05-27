<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon;

use Override;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class JmfTwigIconBundle extends AbstractBundle
{
    protected string $extensionAlias = 'jmf_twig_icon';

    #[Override]
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->import('../config/definition.php');
    }

    /**
     * @param array{
     *     prefix:        string,
     *     template_path: string,
     *     mapping:       array<string, string>,
     * } $config
     */
    #[Override]
    public function loadExtension(
        array $config,
        ContainerConfigurator $configurator,
        ContainerBuilder $container,
    ): void {
        $configurator->import('../config/services.yaml');

        $configurator->parameters()->set("{$this->extensionAlias}.prefix", $config['prefix']);
        $configurator->parameters()->set("{$this->extensionAlias}.template_path", $config['template_path']);
        $configurator->parameters()->set("{$this->extensionAlias}.mapping", $config['mapping']);
    }
}
