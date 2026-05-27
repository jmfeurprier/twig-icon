<?php

declare(strict_types=1);

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $definition): void {
    $definition->rootNode()
        ->children()
            ->scalarNode('prefix')
                ->info('Optional prefix before the "icon" function name.')
                ->defaultValue('')
            ->end()
            ->scalarNode('template_path')
                ->info('Twig template path for rendering icons.')
                ->cannotBeEmpty()
                ->defaultValue('@JmfIcon/material/icon.html.twig')
            ->end()
            ->arrayNode('mapping')
                ->info('Mapping of icon IDs to CSS classes.')
                ->defaultValue([])
                ->useAttributeAsKey('name')
                ->scalarPrototype()
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ->end()
    ;
};
